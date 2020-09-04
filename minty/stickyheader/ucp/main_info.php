<?php
/**
 *
 * Minty Sticky Header. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2020, Minty, https://www.mintymods.info/
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace minty\stickyheader\ucp;

/**
 * Minty Sticky Header UCP module info.
 */
class main_info
{
	public function module()
	{
		return array(
			'filename'	=> '\minty\stickyheader\ucp\main_module',
			'title'		=> 'UCP_STICKYHEADER_TITLE',
			'modes'		=> array(
				'settings'	=> array(
					'title'	=> 'UCP_STICKYHEADER',
					'auth'	=> 'ext_minty/stickyheader',
					'cat'	=> array('UCP_STICKYHEADER_TITLE')
				),
			),
		);
	}
}
