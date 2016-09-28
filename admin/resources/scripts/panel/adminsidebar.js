Ext.ns('admin.panel');
admin.panel.adminsidebar = function() {
	var cls = 'admin-panel-adminsidebar';
	var Class = Ext.extend(admin.panel.sidebar, {
		cls:cls,
		ctCls:cls + '-container',
		title:'Administration Topics',
		constructor:function(config) {
			config = Ext.apply({
				root:new admin.tree.topicnode({
					text:'Administration',
					leaf:false,
					children:[{
						text:'Introduction',
						page:'introduction'
					},{
						text:'Create a new application',
						page:'create-application'
					},{
						text:'Class generator',
						page:'generator'
					}]
				})
			}, config);
			Class.superclass.constructor.call(this, config);
		},
		initComponent:function() {
			Class.superclass.initComponent.call(this);
		}
	});
	return Class;
}();