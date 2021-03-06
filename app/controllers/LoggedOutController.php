<?php
// a controller for the /account route since its alot of code
namespace app\controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Exception\NotFoundException;

class LoggedOutController
{
    public function account($app)
    {
        $app->group('/account', function () use ($app) {
            // show the login, register, forgot password forms
            $app->get('', function ($request, $response, $args) {
                // record where the user came from to send him back
                $prev_route = getPrevRoute($request);
                if ($prev_route != null) {
                    setcookie("prev_route", $route = getPrevRoute($request), time() + (86400 * 30), "/");
                }

                return $this->view->render(
              $response,
              'login_register.php',
              ['router'=>$this->router]
          );
            })->setName('user-login-form');

            $app->post('/info', function ($request, $response, $args) {
                // to check if email and username are available
                $post = $request->getParsedBody();
                if (isset($post['email'])) {
                    $info = \UserQuery::create()
                ->findOneByEmail($request->getParsedBody()['email']);
                } elseif ($post['username']) {
                    $info = \UserQuery::create()
                ->findOneByUsername($request->getParsedBody()['username']);
                }

                echo ($info== null)?"true":"false";
            });

            // info is complete, now check if correct
            $app->post('/credentials', function ($request, $response, $args) {
                $route = null;
                if (isset($_COOKIE['prev_route'])) {
                    $route = $_COOKIE['prev_route'];
                }

                $post = $request->getParsedBody();
                if (isset($post['Login'])) {
                    // trying to log in
                    $user = \UserQuery::create()->findOneByUsername($post['Login']['Username']);

                    if ($user != null && !$user->isConfirmed()) {
                        return $response->withJSON(['success'=>false, 'confirm'=>true, 'msg'=>'Please verify email']);
                    }

                    if ($user == null || !$user->verifyPassword($post['Login']['Password'])) {
                        return $response->withJSON(['success'=>false, 'msg'=>'Incorrect Email or Password']);
                    }

                    $user->logIn();
                    if ($route == null) {
                        $route = $this->router->pathFor('user-profile', ['username'=>$user->getUsername()]);
                    }
                    setcookie('prev_route', '', time() - 3600);
                    return $response->withJSON(['success'=>true,
                  'redirect_link'=> $route]);
                } elseif (isset($post['Register'])) {
                    // trying to make new account
                    $user = new \User();
                    foreach ($post['Register'] as $key => $value) {
                        $user->setByName($key, $value);
                    }
                    $user->setJoinDate(getCurrentDate());
                    // validate here
                    if (!$user->validate()) {
                        return $response->withJSON(['success'=>false, 'msg'=>'Invalid data']);
                    }
                    $user->setRandomConfirmKey();
                    $user->save();
                    // TODO: check if email was sent successfully before saving user
                    \app\utils\Mail::sendConfirmation($user, $this->router);
                    return $response->withJSON(['success'=>true, 'msg'=>'Check your email to confirm']);
                } elseif (isset($post['Forgot'])) {
                    // trying to recover password
                    $user = \UserQuery::create()->findOneByEmail($post['Forgot']['Email']);
                    if ($user!=null) {
                        $user->setRandomResetKey();
                        $user->save();
                        \app\utils\Mail::sendResetPassword($user, $this->router);
                    }
                    return $response->withJSON([]);
                } elseif (isset($post['Resend'])) {
                    // resend confirmation key through email
                    $user = \UserQuery::create()->findOneByUsername($post['username']);
                    if ($user!=null) {
                        \app\utils\Mail::sendConfirmation($user, $this->router);
                    }
                    return $response->withJSON([]);
                } else {
                    // other, not valid
                    return $response->withJSON(['success'=>false]);
                }
            })->setName('user-credentials');
        });
    }

    public static function setUpRouting($app)
    {
        $controller = new LoggedOutController();
        $app->group('', function () use ($app, $controller) {
            $controller->account($app);
        })->add(function ($request, $response, $next) {
            $user = \User::current();
            if ($user == null) {
                // not signed in, so show them forms to sign in
                return $next($request, $response);
            } else {
                // already signed in, redirect to profile
                return $response->withRedirect($this->router->pathFor('user-profile', ['username'=>$user->getUsername()]));
            }
        });
    }
}
