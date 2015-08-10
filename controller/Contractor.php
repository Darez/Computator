<?php
namespace Controller;

use Arbor\Core\Controller;
use Arbor\Provider\Response;
use Common\BasicDataManager;
use Common\BasicFormFormatter;
use Common\BasicGridFormatter;
use Common\ActionColumnFormatter;
use Library\Doctrine\Form\DoctrineDesigner;

class Contractor extends Controller
{
	/**
	 * Prepare data for index view.
	 *
	 * @return array
	 */
	public function index()
	{
		$grid = $this->createGrid();
		return compact('grid');
	}

	/**
	 * Creates grid for index view.
	 *
	 * @return \Arbor\Component\Form\FormBuilder
	 */
	private function createGrid()
	{
		$builder = $this->getService('grid')->create();
		$builder->setFormatter(new BasicGridFormatter('contractor'));
		$builder->setDataManager(new BasicDataManager(
			$this->getDoctrine()->getEntityManager()
			, 'Entity\Contractor'
		));

		$builder->setLimit(10);
		$query = $this->getRequest()->getQuery();
		if (!isset($query['page'])) {
			$query['page'] = 1;
		}
		$builder->setPage($query['page']);

		$builder->addColumn('#', 'id');
		$builder->addColumn('Name', 'name');
		$builder->addColumn('Action', 'id', new ActionColumnFormatter('contractor', array('edit')));
		return $builder;
	}

	/**
	 * Save new entity to database
	 *
	 * @return Response|array
	 */
	public function add()
	{
		$form = $this->createForm();

		if ($form->isValid()) {
			$data = $form->getData();

			$entity = new \Entity\Contractor();
			$this->updateEntity($entity, $data);
			$this->flush();

			$response = new Response();
			$response->redirect('/contractor');

			return $response;

		}
		return compact('form');
	}

	/**
	 * Edit entity
	 *
	 * @param \Entity\Contractor $entity
	 * @return Response|array
	 */
	public function edit($entity)
	{
		$form = $this->createForm($entity);

		if ($form->isValid()) {
			$data = $form->getData();

			$this->updateEntity($entity, $data);
			$this->flush();

			$response = new Response();
			$response->redirect('/contractor');

			return $response;

		}
		return compact('form');
	}

	/**
	 * Update entity fields
	 *
	 * @param \Entity\Contractor $entity
	 * @param $data
	 */
	private function updateEntity($entity, $data)
	{
		$entity->setName($data['name']);
		$entity->setAddress($data['address']);
		$entity->setTaxId($data['taxId']);
		$this->persist($entity);
	}

	/**
	 * Create form for add/edit entity.
	 *
	 * @param null|\Entity\Contractor $entity
	 * @return mixed
	 * @throws \Arbor\Exception\ServiceNotFoundException
	 */
	private function createForm($entity = null)
	{
		$builder = $this->getService('form')->create();
		$builder->setValidatorService($this->getService('validator'));
		$builder->setFormatter(new BasicFormFormatter());
		$builder->setDesigner(new DoctrineDesigner($this->getDoctrine(), 'Entity\Contractor'));

		if ($entity) {
			$helper = $this->getService('form.helper');
			$data = $helper->entityToArray($entity);
			$builder->setData($data);
		}
		$builder->submit($this->getRequest());

		return $builder;
	}

}