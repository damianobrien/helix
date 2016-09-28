<p>
    <label>Site Name (Optional): </label>
    <input id="site" name="site" value=""/>
</p>
<button id="btn-submit" type="button">Run Generator</button>
<script type="text/javascript">

    function getCheckedValues(checkboxes){
        var csv = [];
        for (var i=0; i<checkboxes.length; ++i) {
            csv.push(checkboxes[i].name);
        }
        return csv.join();
    }

    Ext.get('btn-submit').on('click', function () {
        Ext.get('btn-submit').dom.disabled = true;
        Ext.get('generator-output').update('Running Generator...');
        Ext.Ajax.request({
            url:'<?php hurl("/generator?action=runGenerator"); ?>',
            params:{
                "site":Ext.get('site').dom.value,
                "modules":getCheckedValues(Ext.getCmp('modulesCheckboxGroup').getValue())
            },
            callback:function (options, success, response) {
                Ext.get('btn-submit').dom.disabled = false;
                Ext.get('generator-output').update(response.responseText);
            }
        });
    });
</script>
<button id="btn-submit-extjs" type="button">Run ExtJS Generator</button>
<script type="text/javascript">
    Ext.get('btn-submit-extjs').on('click', function () {
        Ext.get('btn-submit-extjs').dom.disabled = true;
        Ext.get('generator-output').update('Running Ext JS Generator...');
        Ext.Ajax.request({
            url:'<?php hurl("/generator?action=runExtJsGenerator"); ?>',
            params:{
                "site":Ext.get('site').dom.value
            },
            callback:function (options, success, response) {
                Ext.get('btn-submit-extjs').dom.disabled = false;
                Ext.get('generator-output').update(response.responseText);
            }
        });
    });
</script>
<p><div id="generator-output" style="margin-top:20px;"></div></p>
<p>
    <label>Include the following Modules: </label>
    <script type="text/javascript">
        var modulesCheckboxGroup = new Ext.form.CheckboxGroup({
            id:'modulesCheckboxGroup',
            xtype:'checkboxgroup',
            columns:2,
            fieldLabel:'Modules',
            itemCls:'x-check-group-alt',
            renderTo:'modules',
            // Put all controls in a single column with width 100%
            columns:1,
            items:[
            <?php
                $checkboxes = array();
                foreach(HelixGenerator::getModules() as $module){
                    $checked=($module==="Core")?"true":"false";
                    $checkboxes[] = "{boxLabel:'{$module}', name:'{$module}', checked:{$checked}}";
                }
                echo implode(",",$checkboxes);
            ?>
            ]
        });
    </script>
</p>
<div id="modules"></div>
