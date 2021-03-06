<?php

namespace ORM\Base;

use \Exception;
use \PDO;
use ORM\PurchaseHistory as ChildPurchaseHistory;
use ORM\PurchaseHistoryQuery as ChildPurchaseHistoryQuery;
use ORM\Map\PurchaseHistoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'purchase_history' table.
 *
 *
 *
 * @method     ChildPurchaseHistoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPurchaseHistoryQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildPurchaseHistoryQuery orderByPurchaseId($order = Criteria::ASC) Order by the purchase_id column
 * @method     ChildPurchaseHistoryQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildPurchaseHistoryQuery orderByOperation($order = Criteria::ASC) Order by the operation column
 * @method     ChildPurchaseHistoryQuery orderByData($order = Criteria::ASC) Order by the data column
 *
 * @method     ChildPurchaseHistoryQuery groupById() Group by the id column
 * @method     ChildPurchaseHistoryQuery groupByUserId() Group by the user_id column
 * @method     ChildPurchaseHistoryQuery groupByPurchaseId() Group by the purchase_id column
 * @method     ChildPurchaseHistoryQuery groupByTime() Group by the time column
 * @method     ChildPurchaseHistoryQuery groupByOperation() Group by the operation column
 * @method     ChildPurchaseHistoryQuery groupByData() Group by the data column
 *
 * @method     ChildPurchaseHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPurchaseHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPurchaseHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPurchaseHistoryQuery leftJoinUserDetail($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserDetail relation
 * @method     ChildPurchaseHistoryQuery rightJoinUserDetail($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserDetail relation
 * @method     ChildPurchaseHistoryQuery innerJoinUserDetail($relationAlias = null) Adds a INNER JOIN clause to the query using the UserDetail relation
 *
 * @method     ChildPurchaseHistoryQuery leftJoinPurchase($relationAlias = null) Adds a LEFT JOIN clause to the query using the Purchase relation
 * @method     ChildPurchaseHistoryQuery rightJoinPurchase($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Purchase relation
 * @method     ChildPurchaseHistoryQuery innerJoinPurchase($relationAlias = null) Adds a INNER JOIN clause to the query using the Purchase relation
 *
 * @method     \ORM\UserDetailQuery|\ORM\PurchaseQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPurchaseHistory findOne(ConnectionInterface $con = null) Return the first ChildPurchaseHistory matching the query
 * @method     ChildPurchaseHistory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPurchaseHistory matching the query, or a new ChildPurchaseHistory object populated from the query conditions when no match is found
 *
 * @method     ChildPurchaseHistory findOneById(string $id) Return the first ChildPurchaseHistory filtered by the id column
 * @method     ChildPurchaseHistory findOneByUserId(string $user_id) Return the first ChildPurchaseHistory filtered by the user_id column
 * @method     ChildPurchaseHistory findOneByPurchaseId(string $purchase_id) Return the first ChildPurchaseHistory filtered by the purchase_id column
 * @method     ChildPurchaseHistory findOneByTime(string $time) Return the first ChildPurchaseHistory filtered by the time column
 * @method     ChildPurchaseHistory findOneByOperation(string $operation) Return the first ChildPurchaseHistory filtered by the operation column
 * @method     ChildPurchaseHistory findOneByData(string $data) Return the first ChildPurchaseHistory filtered by the data column
 *
 * @method     ChildPurchaseHistory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPurchaseHistory objects based on current ModelCriteria
 * @method     ChildPurchaseHistory[]|ObjectCollection findById(string $id) Return ChildPurchaseHistory objects filtered by the id column
 * @method     ChildPurchaseHistory[]|ObjectCollection findByUserId(string $user_id) Return ChildPurchaseHistory objects filtered by the user_id column
 * @method     ChildPurchaseHistory[]|ObjectCollection findByPurchaseId(string $purchase_id) Return ChildPurchaseHistory objects filtered by the purchase_id column
 * @method     ChildPurchaseHistory[]|ObjectCollection findByTime(string $time) Return ChildPurchaseHistory objects filtered by the time column
 * @method     ChildPurchaseHistory[]|ObjectCollection findByOperation(string $operation) Return ChildPurchaseHistory objects filtered by the operation column
 * @method     ChildPurchaseHistory[]|ObjectCollection findByData(string $data) Return ChildPurchaseHistory objects filtered by the data column
 * @method     ChildPurchaseHistory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PurchaseHistoryQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \ORM\Base\PurchaseHistoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pos', $modelName = '\\ORM\\PurchaseHistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPurchaseHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPurchaseHistoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPurchaseHistoryQuery) {
            return $criteria;
        }
        $query = new ChildPurchaseHistoryQuery();
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
     * @return ChildPurchaseHistory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PurchaseHistoryTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PurchaseHistoryTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildPurchaseHistory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, USER_ID, PURCHASE_ID, TIME, OPERATION, DATA FROM purchase_history WHERE ID = :p0';
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
            /** @var ChildPurchaseHistory $obj */
            $obj = new ChildPurchaseHistory();
            $obj->hydrate($row);
            PurchaseHistoryTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildPurchaseHistory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPurchaseHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PurchaseHistoryTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPurchaseHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PurchaseHistoryTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildPurchaseHistoryQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PurchaseHistoryTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PurchaseHistoryTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PurchaseHistoryTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @see       filterByUserDetail()
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPurchaseHistoryQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(PurchaseHistoryTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(PurchaseHistoryTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PurchaseHistoryTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the purchase_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPurchaseId(1234); // WHERE purchase_id = 1234
     * $query->filterByPurchaseId(array(12, 34)); // WHERE purchase_id IN (12, 34)
     * $query->filterByPurchaseId(array('min' => 12)); // WHERE purchase_id > 12
     * </code>
     *
     * @see       filterByPurchase()
     *
     * @param     mixed $purchaseId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPurchaseHistoryQuery The current query, for fluid interface
     */
    public function filterByPurchaseId($purchaseId = null, $comparison = null)
    {
        if (is_array($purchaseId)) {
            $useMinMax = false;
            if (isset($purchaseId['min'])) {
                $this->addUsingAlias(PurchaseHistoryTableMap::COL_PURCHASE_ID, $purchaseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($purchaseId['max'])) {
                $this->addUsingAlias(PurchaseHistoryTableMap::COL_PURCHASE_ID, $purchaseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PurchaseHistoryTableMap::COL_PURCHASE_ID, $purchaseId, $comparison);
    }

    /**
     * Filter the query on the time column
     *
     * Example usage:
     * <code>
     * $query->filterByTime('2011-03-14'); // WHERE time = '2011-03-14'
     * $query->filterByTime('now'); // WHERE time = '2011-03-14'
     * $query->filterByTime(array('max' => 'yesterday')); // WHERE time > '2011-03-13'
     * </code>
     *
     * @param     mixed $time The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPurchaseHistoryQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(PurchaseHistoryTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(PurchaseHistoryTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PurchaseHistoryTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Filter the query on the operation column
     *
     * Example usage:
     * <code>
     * $query->filterByOperation('fooValue');   // WHERE operation = 'fooValue'
     * $query->filterByOperation('%fooValue%'); // WHERE operation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $operation The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPurchaseHistoryQuery The current query, for fluid interface
     */
    public function filterByOperation($operation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($operation)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $operation)) {
                $operation = str_replace('*', '%', $operation);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PurchaseHistoryTableMap::COL_OPERATION, $operation, $comparison);
    }

    /**
     * Filter the query on the data column
     *
     * Example usage:
     * <code>
     * $query->filterByData('fooValue');   // WHERE data = 'fooValue'
     * $query->filterByData('%fooValue%'); // WHERE data LIKE '%fooValue%'
     * </code>
     *
     * @param     string $data The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPurchaseHistoryQuery The current query, for fluid interface
     */
    public function filterByData($data = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($data)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $data)) {
                $data = str_replace('*', '%', $data);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PurchaseHistoryTableMap::COL_DATA, $data, $comparison);
    }

    /**
     * Filter the query by a related \ORM\UserDetail object
     *
     * @param \ORM\UserDetail|ObjectCollection $userDetail The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPurchaseHistoryQuery The current query, for fluid interface
     */
    public function filterByUserDetail($userDetail, $comparison = null)
    {
        if ($userDetail instanceof \ORM\UserDetail) {
            return $this
                ->addUsingAlias(PurchaseHistoryTableMap::COL_USER_ID, $userDetail->getId(), $comparison);
        } elseif ($userDetail instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PurchaseHistoryTableMap::COL_USER_ID, $userDetail->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUserDetail() only accepts arguments of type \ORM\UserDetail or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UserDetail relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPurchaseHistoryQuery The current query, for fluid interface
     */
    public function joinUserDetail($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UserDetail');

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
            $this->addJoinObject($join, 'UserDetail');
        }

        return $this;
    }

    /**
     * Use the UserDetail relation UserDetail object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ORM\UserDetailQuery A secondary query class using the current class as primary query
     */
    public function useUserDetailQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUserDetail($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UserDetail', '\ORM\UserDetailQuery');
    }

    /**
     * Filter the query by a related \ORM\Purchase object
     *
     * @param \ORM\Purchase|ObjectCollection $purchase The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPurchaseHistoryQuery The current query, for fluid interface
     */
    public function filterByPurchase($purchase, $comparison = null)
    {
        if ($purchase instanceof \ORM\Purchase) {
            return $this
                ->addUsingAlias(PurchaseHistoryTableMap::COL_PURCHASE_ID, $purchase->getId(), $comparison);
        } elseif ($purchase instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PurchaseHistoryTableMap::COL_PURCHASE_ID, $purchase->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPurchase() only accepts arguments of type \ORM\Purchase or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Purchase relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPurchaseHistoryQuery The current query, for fluid interface
     */
    public function joinPurchase($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Purchase');

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
            $this->addJoinObject($join, 'Purchase');
        }

        return $this;
    }

    /**
     * Use the Purchase relation Purchase object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ORM\PurchaseQuery A secondary query class using the current class as primary query
     */
    public function usePurchaseQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPurchase($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Purchase', '\ORM\PurchaseQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPurchaseHistory $purchaseHistory Object to remove from the list of results
     *
     * @return $this|ChildPurchaseHistoryQuery The current query, for fluid interface
     */
    public function prune($purchaseHistory = null)
    {
        if ($purchaseHistory) {
            $this->addUsingAlias(PurchaseHistoryTableMap::COL_ID, $purchaseHistory->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the purchase_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PurchaseHistoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PurchaseHistoryTableMap::clearInstancePool();
            PurchaseHistoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PurchaseHistoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PurchaseHistoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PurchaseHistoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PurchaseHistoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PurchaseHistoryQuery
