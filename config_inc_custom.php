<?	
	/**
	* Dark-family templates config START
	**/
	$g_bug_report_page_fields = array(
                'category_id',
                'handler',
                'priority',
                'product_version',
                'product_build',
                'target_version',
                'summary',
				'eta',
                'description',
                'attachments',
                
        ); 
	$g_bug_view_page_fields = array (
				'id',
				'project',
				'category_id',
				'date_submitted',
				'last_updated',
				'reporter',
				'handler',
				'priority',
				'status',
				'eta',
				'summary',
				'description',
				'attachments',
				);
	$g_bug_update_page_fields = array (
				'id',
				'project',
				'category_id',
				'date_submitted',
				'last_updated',
				'reporter',
				'handler',
				'priority',
				'status',
				'eta',
				'summary',
				'description',
				'attachments',
				);
	$g_bug_change_status_page_fields = array (
				'id',
				'project',
				'category_id',
				'date_submitted',
				'last_updated',
				'reporter',
				'handler',
				'priority',
				'status',
				'eta',
				'summary',
				'description',
				'attachments',
	);
	
	$g_status_colors = array( 'new'			=> '#fcbdbd', // red    (scarlet red #ef2929)
							 'feedback'		=> '#e3b7eb', // purple (plum        #75507b)
							 'acknowledged'	=> '#ffcd85', // orange (orango      #f57900)
							 'confirmed'	=> '#fff494', // yellow (butter      #fce94f)
							 'assigned'		=> '#c2dfff', // blue   (sky blue    #729fcf)
							 'resolved'		=> '#d2f5b0', // green  (chameleon   #8ae234)
							 'closed'		=> '#c9ccc4'); // grey  (aluminum    #babdb6)
	$g_show_avatar = ON;
	
	$g_time_tracking_enabled = ON;
	$g_time_tracking_with_billing =ON;
	$g_short_date_format = 'd.m.y';
	$g_normal_date_format = 'd.m.y H:i';
	$g_complete_date_format = 'd.m.Y H:i';
	$g_use_javascript = ON;
	$g_login_title_visible = OFF;
	$g_enable_eta = ON;
	$g_display_bug_padding		= 0;
	/**
	* Dark-family templates config END
	**/
?>