	{if isset($smarty.session.message)}
		<div class="notification {$smarty.session.message.type} png_bg">
			<a href="#" class="close"><img src="/forum/admin/templates/images/icons/cross_grey_small.png" title="Đóng hộp thông báo" alt="close" /></a>
			<div>
				{$smarty.session.message.content} 
			</div>
		</div>													
	{/if}   