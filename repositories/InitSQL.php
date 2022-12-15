<?php

namespace starter\repositories;

/**
 * Initialize the only connection to database
 */
SQLConnection::getInstance()->connect();
