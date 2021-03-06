<?php

namespace Sly\NotificationPusher\Model;

use Sly\NotificationPusher\Model\MessageInterface;

class Message implements MessageInterface
{
    protected $status;
    protected $deviceId;
    protected $message;
    protected $alert;
    protected $sound;
    protected $badge;
    protected $createdAt;
    protected $sentAt;
    protected $userData;

    /**
     * __construct method.
     */
    public function __construct($deviceId, $message = null)
    {
        $this->status    = MessageInterface::STATUS_INIT;
        $this->deviceId  = $deviceId;
        $this->message   = $message;
        $this->alert     = true;
        $this->badge     = 0;
        $this->sound     = 'default';
        $this->createdAt = new \DateTime();
        $this->userData  = false;
    }

    /**
     * __toString method.
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->message;
    }

    /**
     * {@inheritdoc}
     */
    public function getUserData()
    {
        return $this->userData;
    }

    /**
     * {@inheritdoc}
     */
    public function setUserData(array $data)
    {
        $this->userData = $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * {@inheritdoc}
     */
    public function setStatus($status)
    {
        if (true === in_array($status, $this->getSentStatuses())) {
            $this->setSentAt(new \DateTime());
        }

        $this->status = $status;
    }

    /**
     * {@inheritdoc}
     */
    public function getSentStatuses()
    {
        return array(
            MessageInterface::STATUS_SENT,
            MessageInterface::STATUS_SIMULATED_SENT,
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getDeviceId()
    {
	    return $this->deviceId;
    }

    /**
     * {@inheritdoc}
     */
    public function setDeviceId($deviceId)
    {
	    $this->deviceId = $deviceId;
    }

    /**
     * {@inheritdoc}
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * {@inheritdoc}
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * {@inheritdoc}
     */
    public function getAlert()
    {
        return $this->alert;
    }

    /**
     * {@inheritdoc}
     */
    public function hasAlert()
    {
        return (bool) $this->alert;
    }

    /**
     * {@inheritdoc}
     */
    public function setAlert($alert)
    {
        $this->alert = $alert;
    }

    /**
     * {@inheritdoc}
     */
    public function getBadge()
    {
        return $this->badge;
    }

    /**
     * {@inheritdoc}
     */
    public function setBadge($badge)
    {
        $this->badge = $badge;
    }

    /**
     * {@inheritdoc}
     */
    public function getSound()
    {
        return $this->sound;
    }

    /**
     * {@inheritdoc}
     */
    public function setSound($sound)
    {
        $this->sound = $sound;
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * {@inheritdoc}
     */
    public function getSentAt()
    {
        return $this->sentAt;
    }

    /**
     * {@inheritdoc}
     */
    public function setSentAt(\DateTime $sentAt)
    {
        $this->sentAt = $sentAt;
    }
}
