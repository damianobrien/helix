Ext.ns('admin.tab');
admin.tab.admintab = function() {
	var cls = 'admin-tab-admintab';
	var Class = Ext.extend(Ext.Panel, {
		cls:cls,
		ctCls:cls + '-container',
		title:'Administration',
		layout:'border',
		initComponent:function() {
			this.sidebar = new admin.panel.adminsidebar({
				region:'west',
				collapseMode:'mini'
			});
			this.details = new admin.panel.detailpanel({
				region:'center'
			});
			this.items = [this.sidebar, this.details];
			this.on('activate', this.onAdminTabInitialActivate, this, {single:true});
			Class.superclass.initComponent.call(this);
		},
		onAdminTabInitialActivate:function(tab) {
			this.ownerCt.loadPage('introduction');
		}
	});
	return Class;
}();