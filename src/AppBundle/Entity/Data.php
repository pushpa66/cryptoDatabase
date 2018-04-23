<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Data
 *
 * @ORM\Table(name="data")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DataRepository")
 */
class Data
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
     * @ORM\Column(name="date_time", type="string", length=50)
     */
    private $dateTime;

    /**
     * @var float
     *
     * @ORM\Column(name="high", type="float")
     */
    private $high;

    /**
     * @var float
     *
     * @ORM\Column(name="low", type="float")
     */
    private $low;

    /**
     * @var float
     *
     * @ORM\Column(name="close", type="float")
     */
    private $close;

    /**
     * @var float
     *
     * @ORM\Column(name="volume", type="float")
     */
    private $volume;

    /**
     * @var float
     *
     * @ORM\Column(name="sma_20", type="float")
     */
    private $sma20;

    /**
     * @var float
     *
     * @ORM\Column(name="sma", type="float")
     */
    private $sma;

    /**
     * @var float
     *
     * @ORM\Column(name="bb_upper", type="float")
     */
    private $bbUpper;

    /**
     * @var float
     *
     * @ORM\Column(name="bb_lower", type="float")
     */
    private $bbLower;

    /**
     * @var float
     *
     * @ORM\Column(name="ema", type="float")
     */
    private $ema;

    /**
     * @var float
     *
     * @ORM\Column(name="macd", type="float")
     */
    private $macd;

    /**
     * @var float
     *
     * @ORM\Column(name="macd_signal", type="float")
     */
    private $macdSignal;

    /**
     * @var float
     *
     * @ORM\Column(name="close_gain_loss", type="float")
     */
    private $closeGainLoss;

    /**
     * @var float
     *
     * @ORM\Column(name="rsi", type="float")
     */
    private $rsi;

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
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * @param string $dateTime
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
    }

    /**
     * @return float
     */
    public function getHigh()
    {
        return $this->high;
    }

    /**
     * @param float $high
     */
    public function setHigh($high)
    {
        $this->high = $high;
    }

    /**
     * @return float
     */
    public function getLow()
    {
        return $this->low;
    }

    /**
     * @param float $low
     */
    public function setLow($low)
    {
        $this->low = $low;
    }

    /**
     * @return float
     */
    public function getClose()
    {
        return $this->close;
    }

    /**
     * @param float $close
     */
    public function setClose($close)
    {
        $this->close = $close;
    }

    /**
     * @return float
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param float $volume
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
    }

    /**
     * @return float
     */
    public function getSma20()
    {
        return $this->sma20;
    }

    /**
     * @param float $sma20
     */
    public function setSma20($sma20)
    {
        $this->sma20 = $sma20;
    }

    /**
     * @return float
     */
    public function getSma()
    {
        return $this->sma;
    }

    /**
     * @param float $sma
     */
    public function setSma($sma)
    {
        $this->sma = $sma;
    }

    /**
     * @return float
     */
    public function getBbUpper()
    {
        return $this->bbUpper;
    }

    /**
     * @param float $bbUpper
     */
    public function setBbUpper($bbUpper)
    {
        $this->bbUpper = $bbUpper;
    }

    /**
     * @return float
     */
    public function getBbLower()
    {
        return $this->bbLower;
    }

    /**
     * @param float $bbLower
     */
    public function setBbLower($bbLower)
    {
        $this->bbLower = $bbLower;
    }

    /**
     * @return float
     */
    public function getEma()
    {
        return $this->ema;
    }

    /**
     * @param float $ema
     */
    public function setEma($ema)
    {
        $this->ema = $ema;
    }

    /**
     * @return float
     */
    public function getMacd()
    {
        return $this->macd;
    }

    /**
     * @param float $macd
     */
    public function setMacd($macd)
    {
        $this->macd = $macd;
    }

    /**
     * @return float
     */
    public function getMacdSignal()
    {
        return $this->macdSignal;
    }

    /**
     * @param float $macdSignal
     */
    public function setMacdSignal($macdSignal)
    {
        $this->macdSignal = $macdSignal;
    }

    /**
     * @return float
     */
    public function getCloseGainLoss()
    {
        return $this->closeGainLoss;
    }

    /**
     * @param float $closeGainLoss
     */
    public function setCloseGainLoss($closeGainLoss)
    {
        $this->closeGainLoss = $closeGainLoss;
    }

    /**
     * @return float
     */
    public function getRsi()
    {
        return $this->rsi;
    }

    /**
     * @param float $rsi
     */
    public function setRsi($rsi)
    {
        $this->rsi = $rsi;
    }

}

