Ext.ns('admin.tab');
admin.tab.doctab = function() {
	var cls = 'admin-tab-doctab';
	var Class = Ext.extend(Ext.Panel, {
		cls:cls,
		ctCls:cls + '-container',
		title:'Documentation',
		layout:'border',
		initComponent:function() {
			this.sidebar = new admin.panel.docsidebar({
				region:'west',
				collapseMode:'mini'
			});
			this.details = new admin.panel.detailpanel({
				region:'center'
			});
			this.items = [this.sidebar, this.details];
			Class.superclass.initComponent.call(this);
		}
	});
	return Class;
}();