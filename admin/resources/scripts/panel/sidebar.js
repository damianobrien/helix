Ext.ns('admin.panel');
admin.panel.sidebar = function() {
	var cls = 'admin-panel-sidebar';
	var Class = Ext.extend(Ext.tree.TreePanel, {
		cls:cls,
		ctCls:cls + '-container',
		title:'Topics',
		split:true,
		width:300,
		animCollapse:false,
		rootVisible:false,
		animate:false,
		autoScroll:true,
		constructor:function(config) {
			config = Ext.apply({
				loader:new Ext.tree.TreeLoader({
					baseAttrs:{
						nodeType:'admin-tree-topicnode',
						children:[],
						leaf:true,
						singleClickExpand:true
					}
				}),
				root:new admin.tree.topicnode()
			}, config);
			Class.superclass.constructor.call(this, config);
		},
		initComponent:function() {
			this.addListener('click', this.onTopicNodeClick, this);
			Class.superclass.initComponent.call(this);
		},
		onTopicNodeClick:function(node, event) {
			if (node.attributes.page) {
				ui.main.loadPage(node.attributes.page);
			}
		}
	});
	return Class;
}();