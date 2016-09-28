Ext.ns('admin.panel');
admin.panel.detailpanel = function() {
	var cls = 'admin-panel-detailpanel';
	var Class = Ext.extend(Ext.Panel, {
		cls:cls,
		ctCls:cls + '-container',
		title:'Details',
		autoScroll:true,
		titleSeparator:'<span class="admin-crumb-separator">&gt;</span>',
		initComponent:function() {
			this.on('render', this.onDetailPanelRender, this);
			Class.superclass.initComponent.call(this);
		},
		onDetailPanelRender:function(panel) {
			this.ownerCt.sidebar.on('click', this.onTopicNodeClick, this);
		},
		onTopicNodeClick:function(node, event) {
			var crumbs = [],
				n = node;
			while (n) {
				crumbs.unshift(n.attributes.text);
				n = n.parentNode;
			}
			this.setTitle(crumbs.join(this.titleSeparator));
		}
	});
	return Class;
}();