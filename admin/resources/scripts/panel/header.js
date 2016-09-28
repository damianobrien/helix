Ext.ns('admin.panel');
admin.panel.header = function() {
	var cls = 'admin-panel-header';
	var Class = Ext.extend(Ext.Panel, {
		cls:cls,
		ctCls:cls + '-container',
		height:60,
		border:false,
		html:'<h1 class="admin-title">Helix Framework</h1>',
		initComponent:function() {
			Class.superclass.initComponent.call(this);
		}
	});
	return Class;
}();