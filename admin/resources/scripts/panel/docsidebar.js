Ext.ns('admin.panel');
admin.panel.docsidebar = function() {
	var cls = 'admin-panel-docsidebar';
	var Class = Ext.extend(admin.panel.sidebar, {
		cls:cls,
		ctCls:cls + '-container',
		title:'Documentation Topics',
		constructor:function(config) {
			config = Ext.apply({
				root:new admin.tree.topicnode({
					text:'Documentation',
					leaf:false,
					children:[{
						text:'Introduction',
						page:'docs/introduction'
					},{
						text:'Getting Started',
						page:'docs/getting-started',
						leaf:false,
						children:[{
							text:'Installation',
							page:'docs/getting-started/installation'
						},{
							text:'Creating a new application',
							page:'docs/getting-started/creating-a-new-application'
						},{
							text:'Layouts, pages and blocks',
							page:'docs/getting-started/layouts-pages-blocks'
						},{
							text:'Configuration',
							page:'docs/getting-started/configuration'
						},{
							text:'Making your first page',
							page:'docs/getting-started/making-your-first-page'
						},{
							text:'Hello world - Your first application',
							page:'docs/getting-started/hello-world'
						}]
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