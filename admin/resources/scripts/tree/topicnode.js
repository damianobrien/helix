Ext.ns('admin.tree');
admin.tree.topicnode = function() {
	var cls = 'admin-tree-topicnode';
	var Class = Ext.extend(Ext.tree.AsyncTreeNode, {
		constructor: function(attributes) {
			attributes = Ext.apply({
				iconCls:cls + '-icon',
			}, attributes || {});
			Class.superclass.constructor.call(this, attributes);
			this.attributes.cls = [this.attributes.cls, cls].join(" ");
		}
	});
	Ext.tree.TreePanel.nodeTypes[cls] = Class;
	return Class;
}();