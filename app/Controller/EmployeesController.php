<?php
App::uses('AppController', 'Controller');
/**
 * Employees Controller
 *
 * @property Employee $Employee
 * @property PaginatorComponent $Paginator
 */
class EmployeesController extends AppController {
var $theme="Admin";
var $layout="index";
public function beforeFilter(){
	parent::beforeFilter();
	$this->Auth->allow('index', 'view');
}
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index($id = null) {
		$this->Employee->recursive = 0;
		$this->loadmodel('Department');
		$this->set('options', $this->Department->find('list'));
		if ($id) {
			$this->Paginator->settings = array(
		        'conditions' => array('Employee.department_id' => $id),
		        'limit' => 10
		    );
		}
		if ($this->request->is('post')) {
			$name = $this->request->data['Search']['name'];
			$id = $this->request->data['Search']['department_id'];
			if($name !='' || $id != ''){
				$this->Paginator->settings = array(
			        'conditions' => array('Employee.department_id' => $id, 'Employee.name LIKE' => '%'.$name.'%'),
			        'limit' => 10
			    );
			}
		}
		$this->set('employees', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Employee->exists($id)) {
			throw new NotFoundException(__('Invalid employee'));
		}
		$options = array('conditions' => array('Employee.' . $this->Employee->primaryKey => $id));
		$this->set('employee', $this->Employee->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {

			// $filename = "app/webroot/files/".$this->data['Employee']['photo']['name']; 
			// /* copy uploaded file */
			// if (move_uploaded_file($this->data['Employee']['photo']['tmp_name'],$filename)) {
			// /* save message to session */
			// $this->Session->setFlash('File uploaded successfuly. You can view it <a href="/app/webroot/files/'.$this->data['Employee']['photo']['name'].'">here</a>.');
			// /* redirect */
			// $this->redirect(array('action' => 'index'));
			// } else {
			// /* save message to session */
			// $this->Session->setFlash('There was a problem uploading file. Please try again.');
			// }
			////////////
			$this->Employee->create();
			if ($this->Employee->save($this->request->data)) {
				$this->Flash->success(__('The employee has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The employee could not be saved. Please, try again.'));
			}
		}
		$departments = $this->Employee->Department->find('list');
		$this->set(compact('departments'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Employee->exists($id)) {
			throw new NotFoundException(__('Invalid employee'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Employee->save($this->request->data)) {
				$this->Flash->success(__('The employee has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The employee could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Employee.' . $this->Employee->primaryKey => $id));
			$this->request->data = $this->Employee->find('first', $options);
		}
		$departments = $this->Employee->Department->find('list');
		$this->set(compact('departments'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Employee->id = $id;
		if (!$this->Employee->exists()) {
			throw new NotFoundException(__('Invalid employee'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Employee->delete()) {
			$this->Flash->success(__('The employee has been deleted.'));
		} else {
			$this->Flash->error(__('The employee could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
