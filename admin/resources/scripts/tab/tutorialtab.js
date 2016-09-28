Ext.ns('admin.tab');
admin.tab.tutorialtab = function() {
	var cls = 'admin-tab-tutorialtab';
	var Class = Ext.extend(Ext.Panel, {
		cls:cls,
		ctCls:cls + '-container',
		title:'Tutorials',
		layout:'border',
		initComponent:function() {
			this.sidebar = new admin.panel.tutorialsidebar({
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