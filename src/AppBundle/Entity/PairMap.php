<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PairMap
 *
 * @ORM\Table(name="pair_map")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PairMapRepository")
 */
class PairMap
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Exchange")
     * @ORM\JoinColumn(name="exchange_id", referencedColumnName="id")
     */
    private $exchange;

    /**
     * @ORM\ManyToOne(targetEntity="SymbolPair")
     * @ORM\JoinColumn(name="symbol_pair_id", referencedColumnName="id")
     */
    private $symbolPair;

    /**
     * @var string
     *
     * @ORM\Column(name="symbol", type="string", length=50)
     */
    private $symbol;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getExchange()
    {
        return $this->exchange;
    }

    /**
     * @param mixed $exchange
     */
    public function setExchange($exchange)
    {
        $this->exchange = $exchange;
    }

    /**
     * @return mixed
     */
    public function getSymbolPair()
    {
        return $this->symbolPair;
    }

    /**
     * @param mixed $symbolPair
     */
    public function setSymbolPair($symbolPair)
    {
        $this->symbolPair = $symbolPair;
    }

    /**
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
    }

}

