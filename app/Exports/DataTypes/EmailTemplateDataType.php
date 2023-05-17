<?php


namespace App\DataTypes;


class EmailTemplateDataType
{
    private $templateId;
    private $sender;
    private $subject;
    private $mailTemplate;

    /**
     * @return mixed
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * @param mixed $templateId
     */
    public function setTemplateId($templateId): void
    {
        $this->templateId = $templateId;
    }

    /**
     * @return mixed
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param mixed $sender
     */
    public function setSender($sender): void
    {
        $this->sender = $sender;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getMailTemplate()
    {
        return $this->mailTemplate;
    }

    /**
     * @param mixed $mailTemplate
     */
    public function setMailTemplate($mailTemplate): void
    {
        $this->mailTemplate = $mailTemplate;
    }


}
