	{if isset($smarty.session.message)}
		<script>
		window.onload = function(){
        	alert('{$smarty.session.message.content}');
		}
        </script>												
	{/if}   