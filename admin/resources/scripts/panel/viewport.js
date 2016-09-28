Ext.ns('admin.panel');
admin.panel.viewport = function() {
	var cls = 'admin-panel-viewport';
	var Class = Ext.extend(Ext.Viewport, {
		id:'ui',
		cls:cls,
		layout:'border',
		initComponent:function() {
			this.header = new admin.panel.header({
				region:'north'
			});
			this.main = new admin.panel.main({
				region:'center',
				margins:'0 5 5 5'
			});
			this.items = [this.header, this.main];
			Class.superclass.initComponent.call(this);
		}
	});
	return Class;
}();