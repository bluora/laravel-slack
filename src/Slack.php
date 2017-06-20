<?php

namespace Bluora\LaravelSlack;

use Bluora\Slack\ActionConfirmation;
use Bluora\Slack\Attachment;
use Bluora\Slack\AttachmentAction;
use Bluora\Slack\AttachmentField;
use Bluora\Slack\Client;

class Slack extends Client
{
    /**
     * Create a new attahcment.
     *
     * @return Attachment
     */
    public function createAttachment($attributes = [])
    {
        return new Attachment($attributes);
    }

    /**
     * Create a action confirmation.
     *
     * @return Attachment
     */
    public function createConfirmation($attributes = [])
    {
        return new ActionConfirmation($attributes);
    }

    /**
     * Create a new attahcment action.
     *
     * @return AttachmentAction
     */
    public function createAction($attributes = [])
    {
        return new AttachmentAction($attributes);
    }

    /**
     * Create a new attahcment field.
     *
     * @return AttachmentField
     */
    public function createField($attributes = [])
    {
        return new AttachmentField($attributes);
    }
}
