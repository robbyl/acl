<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Acl\Model\Table;

use Cake\Acl\Model\Table\AclNodesTable;

use Cake\Core\App;

/**
 * Access Request Object
 *
 */
class ArosTable extends AclNodesTable {

/**
 * {@inheritDoc}
 *
 * @param array $config Config
 * @return void
 */
	public function initialize(array $config) {
		parent::initialize($config);
		$this->alias('Aros');
		$this->table('aros');
		$this->addBehavior('Tree', ['type' => 'nested']);

		$this->belongsToMany('Acos', [
			'through' => App::className('Cake/Acl.PermissionsTable', 'Model/Table'),
			'className' => App::className('Cake/Acl.AcosTable', 'Model/Table'),
		]);
		$this->hasMany('AroChildren', [
			'className' => App::className('Cake/Acl.ArosTable', 'Model/Table'),
			'foreignKey' => 'parent_id'
		]);

		$this->entityClass('Cake/Acl.Aro', 'Model/Entity');
	}

}