<?php

use app\controllers\LoggedInController;

require '../vendor/autoload.php';

// adding an external config file
require '../config.php';

require '../dont_push.php';

// to protect from fake urls
$url = url();
$url1= 'http://localhost/kode_central/html';
$url2 = 'https://kodecentral.com';
if (substr($url, 0, strlen($url1)) !== $url1 && substr($url, 0, strlen($url2)) !== $url2) {
    header('Location: '.'https://kodecentral.com');
    exit();
}

require '../data/generated-conf/config.php';

$app = new \Slim\App(["settings" => $config]);

$container = $app->getContainer();
$container['view'] = new \Slim\Views\PhpRenderer("../app/views/");

// if url is not found (404)
$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        return $c['view']->render(
            $response->withStatus(404),
            '404.php',
        ['router' => $c->router]
        );
    };
};

$app->get('/sitemap.xml', function ($request, $response, $args) {
    $response = $response->withHeader('Content-type', 'application/xml');

    // base urls
    $urls = ["/","/search","/contact","/about-us","/faq","/all-pages"];

    // variables that have children links
    // ex: post/{post-link}
    $posts = \PostQuery::create()->find();
    $users = \UserQuery::create()->find();
    $libs = \LibraryQuery::create()->find();
    return $this->view->render(
          $response,
          'sitemap.php',
          ['router'=>$this->router, 'urls'=>$urls, 'posts'=>$posts, 'users'=>$users, 'libs'=>$libs]
      );
});

app\controllers\AllController::setUpRouting($app);
app\controllers\LoggedInController::setUpRouting($app);
app\controllers\LoggedOutController::setUpRouting($app);


$app->run();
