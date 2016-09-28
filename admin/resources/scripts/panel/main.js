Ext.ns('admin.panel');
admin.panel.main = function() {
	var cls = 'admin-panel-main';
	var Class = Ext.extend(Ext.TabPanel, {
		cls:cls,
		ctCls:cls + '-container',
		activeTab:0,
		border:false,
		forceLayout:true,
		resizeTabs:true,
		minTabWidth:120,
		initComponent:function() {
			this.admintab = new admin.tab.admintab();
			this.doctab = new admin.tab.doctab();
			this.tutorialtab = new admin.tab.tutorialtab();
			this.items = [this.admintab, this.doctab, this.tutorialtab];
			Ext.getCmp('ui').on('render', this.onViewportRender, this);
			Class.superclass.initComponent.call(this);
		},
		onViewportRender:function(viewport) {
			this.loadPage('introduction');
		},
		loadPage:function(page) {
			var activeTab = this.getActiveTab();
			if (activeTab) {
				activeTab.details.load({
					url:'<?php hurl("/"); ?>' + page,
					scripts:true
				});
			}
		}
	});
	return Class;
}();