<?php
/**
 * Adapter Interface
 * @file 		RedBean/Adapter.php
 * @description		Describes the API for a RedBean Database Adapter.
 * @author			Gabor de Mooij
 * @license			BSD
 *
 * (c) G.J.G.T. (Gabor) de Mooij
 * This source file is subject to the BSD license that is bundled
 * with this source code in the file license.txt.
 *
 */
interface RedBean_Adapter {

	/**
	 * Returns the latest SQL statement
	 * @return string $SQLString
	 */
	public function getSQL();

	/**
	 * Escapes a value for usage in an SQL statement
	 * @param string $sqlvalue
	 */
	public function escape( $sqlvalue );

	/**
	 * Executes an SQL Statement using an array of values to bind
	 * If $noevent is TRUE then this function will not signal its
	 * observers to notify about the SQL execution; this to prevent
	 * infinite recursion when using observers.
	 * @param string $sql
	 * @param array $aValues
	 * @param boolean $noevent
	 */
	public function exec( $sql , $aValues=array(), $noevent=false);

	/**
	 * Executes an SQL Query and returns a resultset.
	 * This method returns a multi dimensional resultset similar to getAll
	 * The values array can be used to bind values to the place holders in the
	 * SQL query.
	 * @param string $sql
	 * @param array $aValues
	 */
	public function get( $sql, $aValues = array() );

	/**
	 * Executes an SQL Query and returns a resultset.
	 * This method returns a single row (one array) resultset.
	 * The values array can be used to bind values to the place holders in the
	 * SQL query.
	 * @param string $sql
	 * @param array $aValues
	 * @return array $aMultiDimArray
	 */
	public function getRow( $sql, $aValues = array() );

	/**
	 * Executes an SQL Query and returns a resultset.
	 * This method returns a single column (one array) resultset.
	 * The values array can be used to bind values to the place holders in the
	 * SQL query.
	 * @param string $sql
	 * @param array $aValues
	 * @return array $aSingleDimArray
	 */
	public function getCol( $sql, $aValues = array() );

	/**
	 * Executes an SQL Query and returns a resultset.
	 * This method returns a single cell, a scalar value as the resultset.
	 * The values array can be used to bind values to the place holders in the
	 * SQL query.
	 * @param string $sql
	 * @param array $aValues
	 * @return string $sSingleValue
	 */
	public function getCell( $sql, $aValues = array() );

	/**
	 * Executes the SQL query specified in $sql and takes
	 * the first two columns of the resultset. This function transforms the
	 * resultset into an associative array. Values from the the first column will
	 * serve as keys while the values of the second column will be used as values.
	 * The values array can be used to bind values to the place holders in the
	 * SQL query.
	 * @param string $sql
	 * @param array $values
	 * @return array $associativeArray
	 */
	public function getAssoc( $sql, $values = array() );

	/**
	 * Returns the latest insert ID.
	 * @return integer $id
	 */
	public function getInsertID();

	/**
	 * Returns the number of rows that have been
	 * affected by the last update statement.
	 * @return integer $count
	 */
	public function getAffectedRows();

	/**
	 * Returns the original database resource. This is useful if you want to
	 * perform operations on the driver directly instead of working with the
	 * adapter. RedBean will only access the adapter and never to talk
	 * directly to the driver though.
	 * @return object $driver
	 */
	public function getDatabase();

	/**
	 * Returns the latest error message; if any.
	 * @return string $message
	 */
	public function getErrorMsg();

	/**
	 * This method is part of the RedBean Transaction Management
	 * mechanisms.
	 * Starts a transaction.
	 */
	public function startTransaction();

	/**
	 * This method is part of the RedBean Transaction Management
	 * mechanisms.
	 * Commits the transaction.
	 */
	public function commit();

	/**
	 * This method is part of the RedBean Transaction Management
	 * mechanisms.
	 * Rolls back the transaction.
	 */
	public function rollback();

}