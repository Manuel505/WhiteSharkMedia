<?php

namespace App\Entity;

use App\Repository\AccountsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccountsRepository::class)
 */
class Accounts
{
    /**
     * @ORM\_id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $_id;

    public function getId(): ?int
    {
        return $this->_id;
    }
    /**
     * @ORM\accountId
     * @ORM\GeneratedValue
     * @ORM\Column(type="text")
     */
    private $accountId;

    public function getAccountId()
    {
        return $this->accountId;
    }

        /**
     * @ORM\externalAccountId
     * @ORM\GeneratedValue
     * @ORM\Column(type="text")
     */
    private $externalAccountId;

    public function getExternalAccountId()
    {
        return $this->externalAccountId;
    }
    /**
     * @ORM\currencyCode
     * @ORM\GeneratedValue
     * @ORM\Column(type="text")
     */
    private $currencyCode;

    public function getcurrencyCode()
    {
        return $this->currencyCode;
    }
        /**
     * @ORM\status
     * @ORM\GeneratedValue
     * @ORM\Column(type="text")
     */
    private $status;

    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * @ORM\type
     * @ORM\GeneratedValue
     * @ORM\Column(type="text")
     */
    private $type;

    public function getType()
    {
        return $this->type;
    }

      /**
     * @ORM\accountName
     * @ORM\GeneratedValue
     * @ORM\Column(type="text")
     */
    private $accountName;

    public function getAccountName()
    {
        return $this->accountName;
    }
  					
}
