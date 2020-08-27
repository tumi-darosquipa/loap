<?php

namespace Tumihub\Loap\Demo;


use Tumihub\Loap\Demo\Types\Product;

/**
 * Methods used by Demo service class.
 */
class DemoProvider
{
    /**
     * Returns boolean status flag for given user and password.
     *
     * @param string $user
     * @param string $password
     * @return bool
     */
    public static function validateUser($user, $password)
    {
        return (($user == config('loap.mock.user')) && ($password == config('loap.mock.password'))) ? true : false;
    }

    /**
     * Returns token for given user.
     *
     * @param string $user
     * @return string
     */
    public static function getToken($user)
    {
        return ($user == config('loap.mock.user')) ? config('loap.mock.token') : '';
    }

    /**
     * Returns boolean status flag for given token string.
     *
     * @param string $token
     * @return bool
     */
    public static function validateToken($token)
    {
        return ($token == config('loap.mock.token'));
    }

    /**
     * Returns true if a user exists with given token or user and password.
     *
     * @param string $token
     * @param string $user
     * @param string $password
     * @return bool
     */
    public static function authenticate($token = '', $user = '', $password = '')
    {
        $result = false;

        if ($token) {
            $result = self::validateToken($token);
        } elseif ($user && $password) {
            $result = self::validateUser($user, $password);
        }

        return $result;
    }

    /**
     * Returns product by id.
     *
     * @param int $productId
     * @return \Tumihub\Loap\Demo\Types\Product
     */
    public static function findProduct($productId)
    {
        return new Product(456, 'North Face Summit Ski Jacket', 'Outerwear', 'Women', 249.98);
    }

    /**
     * Returns array of products by search criteria.
     *
     * @param array $criteria
     * @return \Tumihub\Loap\Demo\Types\Product[]
     */
    public static function findProductsBy($criteria = [])
    {
        return array(
            new Product(456, 'North Face Summit Ski Jacket', 'Outerwear', 'Women', 249.98),
            new Product(789, 'Marmot Crew Neck Base Layer', 'Outerwear', 'Men', 95.29)
        );
    }
    
}
