<?php
/**
 *
 * Minty Sticky Header. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2020, Minty, https://www.mintymods.info/
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace minty\stickyheader\event;

/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Minty Sticky Header Event listener.
 */
class main_listener implements EventSubscriberInterface
{
	public static function getSubscribedEvents()
	{
		return array(
			'core.user_setup'			=> 'load_language_on_setup',
			'core.page_footer_after'	=> 'page_footer_after',
		);
	}

	/* @var \phpbb\language\language */
	protected $language;

	/** @var \phpbb\template\template */
	protected $template;
	
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\user */
	protected $user;

	/**
	 * Constructor
	 *
	 * @param \phpbb\language\language	$language	Language object
	 */
	public function __construct(\phpbb\language\language $language, 
								\phpbb\template\template $template, 
								\phpbb\config\config $config, 
								\phpbb\user $user)
	{
		$this->config	= $config;
		$this->language = $language;
		$this->template	= $template;
		$this->user		= $user;
	}

	/**
	 * Load common language files during user setup
	 *
	 * @param \phpbb\event\data	$event	Event object
	 */
	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'minty/stickyheader',
			'lang_set' => 'common',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	public function page_footer_after($event)
	{
		$this->template->assign_vars(array(
			'STICKY_HEADER_ENABLED'         => $this->user->data['minty_stickyheader'],
			//'STICKY_HEADER_ENABLED'         => !empty($this->user->data['minty_stickyheader']) ? $this->user->data['minty_stickyheader'] : 0,
		));
	}



}
