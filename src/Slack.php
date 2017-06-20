<?php

namespace Bluora\LaravelSlack;

use Bluora\Slack\ActionConfirmation;
use Bluora\Slack\Attachment;
use Bluora\Slack\AttachmentAction;
use Bluora\Slack\AttachmentField;
use Bluora\Slack\Client;
use GuzzleHttp\Client as Guzzle;

class Slack extends Client
{

    public function __construct($app)
    {
        parent::__construct(
            $app['config']->get('slack.endpoint'),
            [
                'channel'                 => $app['config']->get('slack.channel'),
                'username'                => $app['config']->get('slack.username'),
                'icon'                    => $app['config']->get('slack.icon'),
                'link_names'              => $app['config']->get('slack.link_names'),
                'unfurl_links'            => $app['config']->get('slack.unfurl_links'),
                'unfurl_media'            => $app['config']->get('slack.unfurl_media'),
                'allow_markdown'          => $app['config']->get('slack.allow_markdown'),
                'markdown_in_attachments' => $app['config']->get('slack.markdown_in_attachments'),
            ],
            new Guzzle()
        );

        return $this;
    }

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
