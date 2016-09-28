<form id="frm-create-application" action="<?php hurl("/create-application"); ?>" method="post">
	<p>
		<label for="application-name">Application Name: </label>
		<input type="text" name="application-name" />
	</p>
	<button id="btn-submit" type="submit">Create Application</button>
	<script type="text/javascript">
		Ext.get('frm-create-application').on('submit', function() {
			Ext.get('btn-submit').dom.disabled = true;
			Ext.get('status').update('Creating Application...');
			Ext.Ajax.request({
				url:'<?php hurl("/create-application?action=createApplication"); ?>',
				form:Ext.get('frm-create-application'),
				callback:function(options, success, response) {
					Ext.get('btn-submit').dom.disabled = false;
					Ext.get('status').update(response.responseText);
				}
			});
		}, this, {stopEvent:true});
	</script>
</form>
<div id="status" style="margin-top:20px;"></div>