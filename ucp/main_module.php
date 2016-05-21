<?php

namespace HeatWare\integration\ucp;

class main_module
{
	var $u_action;

	function main($id, $mode)
	{
		global $db, $request, $template, $user;

		$user->add_lang_ext('HeatWare/integration', 'common');
		$this->tpl_name = 'ucp_body';
		$this->page_title = $user->lang('HEATWARE_SETTINGS_TITLE');
		add_form_key('heatware/integration');

		$data = array(
			'heatware_enabled' => $request->variable('heatware_enabled', 0),
		);

		if ($request->is_set_post('submit'))
		{
			if (!check_form_key('heatware/integration'))
			{
				trigger_error('FORM_INVALID');
			}

			$sql = 'UPDATE ' . USERS_TABLE . '
				SET ' . $db->sql_build_array('UPDATE', $data) . '
				WHERE user_id = ' . $user->data['user_id'];
			$db->sql_query($sql);

			meta_refresh(3, $this->u_action);
			$message = $user->lang('HEATWARE_SAVED') . '<br /><br />' . $user->lang('RETURN_UCP', '<a href="' . $this->u_action . '">', '</a>');
			trigger_error($message);
		}

		$show_badge_setting = '';
		if( $user->data['heatware_enabled'] )
		{
			$show_badge_setting = 'checked';
		}

		$template->assign_vars(array(
			'L_HEATWARE_SHOW_BADGE'	=> $user->lang('HEATWARE_SHOW_BADGE_SETTING'),
			'S_HEATWARE_SHOW_BADGE'	=> $show_badge_setting,
			'S_UCP_ACTION'	=> $this->u_action,
		));
	}
}
