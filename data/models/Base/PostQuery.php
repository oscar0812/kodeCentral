<?php

namespace Base;

use \Post as ChildPost;
use \PostQuery as ChildPostQuery;
use \Exception;
use \PDO;
use Map\PostTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'post' table.
 *
 *
 *
 * @method     ChildPostQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPostQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildPostQuery orderByHyperlink($order = Criteria::ASC) Order by the hyperlink column
 * @method     ChildPostQuery orderBySummary($order = Criteria::ASC) Order by the summary column
 * @method     ChildPostQuery orderByText($order = Criteria::ASC) Order by the text column
 * @method     ChildPostQuery orderByPostedDate($order = Criteria::ASC) Order by the posted_date column
 * @method     ChildPostQuery orderByPostedByUserId($order = Criteria::ASC) Order by the posted_by_user_id column
 *
 * @method     ChildPostQuery groupById() Group by the id column
 * @method     ChildPostQuery groupByTitle() Group by the title column
 * @method     ChildPostQuery groupByHyperlink() Group by the hyperlink column
 * @method     ChildPostQuery groupBySummary() Group by the summary column
 * @method     ChildPostQuery groupByText() Group by the text column
 * @method     ChildPostQuery groupByPostedDate() Group by the posted_date column
 * @method     ChildPostQuery groupByPostedByUserId() Group by the posted_by_user_id column
 *
 * @method     ChildPostQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPostQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPostQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPostQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPostQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPostQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPostQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ChildPostQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ChildPostQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ChildPostQuery joinWithUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the User relation
 *
 * @method     ChildPostQuery leftJoinWithUser() Adds a LEFT JOIN clause and with to the query using the User relation
 * @method     ChildPostQuery rightJoinWithUser() Adds a RIGHT JOIN clause and with to the query using the User relation
 * @method     ChildPostQuery innerJoinWithUser() Adds a INNER JOIN clause and with to the query using the User relation
 *
 * @method     ChildPostQuery leftJoinPostCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the PostCategory relation
 * @method     ChildPostQuery rightJoinPostCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PostCategory relation
 * @method     ChildPostQuery innerJoinPostCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the PostCategory relation
 *
 * @method     ChildPostQuery joinWithPostCategory($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PostCategory relation
 *
 * @method     ChildPostQuery leftJoinWithPostCategory() Adds a LEFT JOIN clause and with to the query using the PostCategory relation
 * @method     ChildPostQuery rightJoinWithPostCategory() Adds a RIGHT JOIN clause and with to the query using the PostCategory relation
 * @method     ChildPostQuery innerJoinWithPostCategory() Adds a INNER JOIN clause and with to the query using the PostCategory relation
 *
 * @method     \UserQuery|\PostCategoryQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPost findOne(ConnectionInterface $con = null) Return the first ChildPost matching the query
 * @method     ChildPost findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPost matching the query, or a new ChildPost object populated from the query conditions when no match is found
 *
 * @method     ChildPost findOneById(int $id) Return the first ChildPost filtered by the id column
 * @method     ChildPost findOneByTitle(string $title) Return the first ChildPost filtered by the title column
 * @method     ChildPost findOneByHyperlink(string $hyperlink) Return the first ChildPost filtered by the hyperlink column
 * @method     ChildPost findOneBySummary(string $summary) Return the first ChildPost filtered by the summary column
 * @method     ChildPost findOneByText(string $text) Return the first ChildPost filtered by the text column
 * @method     ChildPost findOneByPostedDate(string $posted_date) Return the first ChildPost filtered by the posted_date column
 * @method     ChildPost findOneByPostedByUserId(int $posted_by_user_id) Return the first ChildPost filtered by the posted_by_user_id column *

 * @method     ChildPost requirePk($key, ConnectionInterface $con = null) Return the ChildPost by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPost requireOne(ConnectionInterface $con = null) Return the first ChildPost matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPost requireOneById(int $id) Return the first ChildPost filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPost requireOneByTitle(string $title) Return the first ChildPost filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPost requireOneByHyperlink(string $hyperlink) Return the first ChildPost filtered by the hyperlink column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPost requireOneBySummary(string $summary) Return the first ChildPost filtered by the summary column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPost requireOneByText(string $text) Return the first ChildPost filtered by the text column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPost requireOneByPostedDate(string $posted_date) Return the first ChildPost filtered by the posted_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPost requireOneByPostedByUserId(int $posted_by_user_id) Return the first ChildPost filtered by the posted_by_user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPost[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPost objects based on current ModelCriteria
 * @method     ChildPost[]|ObjectCollection findById(int $id) Return ChildPost objects filtered by the id column
 * @method     ChildPost[]|ObjectCollection findByTitle(string $title) Return ChildPost objects filtered by the title column
 * @method     ChildPost[]|ObjectCollection findByHyperlink(string $hyperlink) Return ChildPost objects filtered by the hyperlink column
 * @method     ChildPost[]|ObjectCollection findBySummary(string $summary) Return ChildPost objects filtered by the summary column
 * @method     ChildPost[]|ObjectCollection findByText(string $text) Return ChildPost objects filtered by the text column
 * @method     ChildPost[]|ObjectCollection findByPostedDate(string $posted_date) Return ChildPost objects filtered by the posted_date column
 * @method     ChildPost[]|ObjectCollection findByPostedByUserId(int $posted_by_user_id) Return ChildPost objects filtered by the posted_by_user_id column
 * @method     ChildPost[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PostQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PostQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Post', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPostQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPostQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPostQuery) {
            return $criteria;
        }
        $query = new ChildPostQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPost|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PostTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PostTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPost A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, title, hyperlink, summary, text, posted_date, posted_by_user_id FROM post WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildPost $obj */
            $obj = new ChildPost();
            $obj->hydrate($row);
            PostTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildPost|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PostTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PostTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PostTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PostTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the hyperlink column
     *
     * Example usage:
     * <code>
     * $query->filterByHyperlink('fooValue');   // WHERE hyperlink = 'fooValue'
     * $query->filterByHyperlink('%fooValue%', Criteria::LIKE); // WHERE hyperlink LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hyperlink The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function filterByHyperlink($hyperlink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hyperlink)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostTableMap::COL_HYPERLINK, $hyperlink, $comparison);
    }

    /**
     * Filter the query on the summary column
     *
     * Example usage:
     * <code>
     * $query->filterBySummary('fooValue');   // WHERE summary = 'fooValue'
     * $query->filterBySummary('%fooValue%', Criteria::LIKE); // WHERE summary LIKE '%fooValue%'
     * </code>
     *
     * @param     string $summary The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function filterBySummary($summary = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($summary)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostTableMap::COL_SUMMARY, $summary, $comparison);
    }

    /**
     * Filter the query on the text column
     *
     * Example usage:
     * <code>
     * $query->filterByText('fooValue');   // WHERE text = 'fooValue'
     * $query->filterByText('%fooValue%', Criteria::LIKE); // WHERE text LIKE '%fooValue%'
     * </code>
     *
     * @param     string $text The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function filterByText($text = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($text)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostTableMap::COL_TEXT, $text, $comparison);
    }

    /**
     * Filter the query on the posted_date column
     *
     * Example usage:
     * <code>
     * $query->filterByPostedDate('2011-03-14'); // WHERE posted_date = '2011-03-14'
     * $query->filterByPostedDate('now'); // WHERE posted_date = '2011-03-14'
     * $query->filterByPostedDate(array('max' => 'yesterday')); // WHERE posted_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $postedDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function filterByPostedDate($postedDate = null, $comparison = null)
    {
        if (is_array($postedDate)) {
            $useMinMax = false;
            if (isset($postedDate['min'])) {
                $this->addUsingAlias(PostTableMap::COL_POSTED_DATE, $postedDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($postedDate['max'])) {
                $this->addUsingAlias(PostTableMap::COL_POSTED_DATE, $postedDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostTableMap::COL_POSTED_DATE, $postedDate, $comparison);
    }

    /**
     * Filter the query on the posted_by_user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPostedByUserId(1234); // WHERE posted_by_user_id = 1234
     * $query->filterByPostedByUserId(array(12, 34)); // WHERE posted_by_user_id IN (12, 34)
     * $query->filterByPostedByUserId(array('min' => 12)); // WHERE posted_by_user_id > 12
     * </code>
     *
     * @see       filterByUser()
     *
     * @param     mixed $postedByUserId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function filterByPostedByUserId($postedByUserId = null, $comparison = null)
    {
        if (is_array($postedByUserId)) {
            $useMinMax = false;
            if (isset($postedByUserId['min'])) {
                $this->addUsingAlias(PostTableMap::COL_POSTED_BY_USER_ID, $postedByUserId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($postedByUserId['max'])) {
                $this->addUsingAlias(PostTableMap::COL_POSTED_BY_USER_ID, $postedByUserId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostTableMap::COL_POSTED_BY_USER_ID, $postedByUserId, $comparison);
    }

    /**
     * Filter the query by a related \User object
     *
     * @param \User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPostQuery The current query, for fluid interface
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(PostTableMap::COL_POSTED_BY_USER_ID, $user->getId(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PostTableMap::COL_POSTED_BY_USER_ID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type \User or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', '\UserQuery');
    }

    /**
     * Filter the query by a related \PostCategory object
     *
     * @param \PostCategory|ObjectCollection $postCategory the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPostQuery The current query, for fluid interface
     */
    public function filterByPostCategory($postCategory, $comparison = null)
    {
        if ($postCategory instanceof \PostCategory) {
            return $this
                ->addUsingAlias(PostTableMap::COL_ID, $postCategory->getPostId(), $comparison);
        } elseif ($postCategory instanceof ObjectCollection) {
            return $this
                ->usePostCategoryQuery()
                ->filterByPrimaryKeys($postCategory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPostCategory() only accepts arguments of type \PostCategory or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PostCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function joinPostCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PostCategory');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PostCategory');
        }

        return $this;
    }

    /**
     * Use the PostCategory relation PostCategory object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PostCategoryQuery A secondary query class using the current class as primary query
     */
    public function usePostCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPostCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PostCategory', '\PostCategoryQuery');
    }

    /**
     * Filter the query by a related Category object
     * using the post_category table as cross reference
     *
     * @param Category $category the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPostQuery The current query, for fluid interface
     */
    public function filterByCategory($category, $comparison = Criteria::EQUAL)
    {
        return $this
            ->usePostCategoryQuery()
            ->filterByCategory($category, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPost $post Object to remove from the list of results
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function prune($post = null)
    {
        if ($post) {
            $this->addUsingAlias(PostTableMap::COL_ID, $post->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the post table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PostTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PostTableMap::clearInstancePool();
            PostTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PostTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PostTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PostTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PostTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PostQuery
