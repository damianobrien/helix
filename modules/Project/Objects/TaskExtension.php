<?php
/**
 * This is an extension of the TaskRelationships class in the Helix Class Library
 * 
 * Add methods and/or properties to this class to extend the functionality of the
 * Task class family.  Changes to this class will affect all sites that use
 * this installation of the Helix Class Library.
 * 
 * If you need to customize this class for a single site, custom code should be placed
 * in a class called Task, and should extend the TaskExtension class.
 * The custom code file should be in the site folder called: library/Task.php
 * 
 * Object -> Task
 */
class TaskExtension extends TaskRelationships {

	public function __construct($id = null, $code = null, $projectCode = null)
	{
		parent::__construct();
		
		if (!isset($code) && !isset($projectCode))
		{
			parent::__construct($id);
		}
		else
		{
			$db = Database::getInstance();
			$q  = "SELECT t.{$db->le}id{$db->re} FROM {$db->le}task{$db->re} t ";
			$q .= "INNER JOIN {$db->le}projectentity_task{$db->re} p_t ";
			$q .= "ON p_t.{$db->le}task_id{$db->re} = t.{$db->le}id{$db->re} AND p_t.{$db->le}deleted{$db->re} = 0 ";
			$q .= "INNER JOIN {$db->le}projectentity{$db->re} p ";
			$q .= "on p_t.{$db->le}projectentity_id{$db->re} = p.{$db->le}id{$db->re} AND p.{$db->le}deleted{$db->re} = 0 ";
			$q .= "WHERE t.{$db->le}deleted{$db->re} = 0 AND t.{$db->le}code{$db->re} = {$db->queryValue($code)} AND p.{$db->le}code{$db->re} = {$db->queryValue($projectCode)}";
			
			$db->query($q);
			$this->code = $code;
			if ($db->getRecord() && $db->getNumRows()===1)
			{
				$this->id = $db->f("id");
				parent::__construct($this->id);
			}
		}
	}
}
?>