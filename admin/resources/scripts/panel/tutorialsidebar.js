Ext.ns('admin.panel');
admin.panel.tutorialsidebar = function() {
	var cls = 'admin-panel-tutorialsidebar';
	var Class = Ext.extend(admin.panel.sidebar, {
		cls:cls,
		ctCls:cls + '-container',
		title:'Tutorial Topics',
		constructor:function(config) {
			config = Ext.apply({
				root:new admin.tree.topicnode({
					text:'Tutorials',
					leaf:false,
					children:[{
						text:'Beginner',
						page:'tutorials/beginner'
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