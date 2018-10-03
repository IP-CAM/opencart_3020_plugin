<?php
class ControllerExtensionModuleProductshow extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/module/productshow');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/module');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if (!isset($this->request->get['module_id'])) {
				$this->model_setting_module->addModule('productshow', $this->request->post);
			} else {
				$this->model_setting_module->editModule($this->request->get['module_id'], $this->request->post);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = '';
		}

        if (isset($this->error['frontname'])) {
            $data['fronterror_name'] = $this->error['frontname'];
        } else {
            $data['fronterror_name'] = '';
        }

		if (isset($this->error['width'])) {
			$data['error_width'] = $this->error['width'];
		} else {
			$data['error_width'] = '';
		}

		if (isset($this->error['height'])) {
			$data['error_height'] = $this->error['height'];
		} else {
			$data['error_height'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
		);

		if (!isset($this->request->get['module_id'])) {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/module/productshow', 'user_token=' . $this->session->data['user_token'], true)
			);
		} else {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/module/productshow', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->get['module_id'], true)
			);
		}

		if (!isset($this->request->get['module_id'])) {
			$data['action'] = $this->url->link('extension/module/productshow', 'user_token=' . $this->session->data['user_token'], true);
		} else {
			$data['action'] = $this->url->link('extension/module/productshow', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->get['module_id'], true);
		}

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);

		if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$module_info = $this->model_setting_module->getModule($this->request->get['module_id']);
		}

		$data['user_token'] = $this->session->data['user_token'];

		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($module_info)) {
			$data['name'] = $module_info['name'];
		} else {
			$data['name'] = '';
		}

        if (isset($this->request->post['frontname'])) {
            $data['frontname'] = $this->request->post['frontname'];
        } elseif (!empty($module_info)) {
            $data['frontname'] = $module_info['frontname'];
        } else {
            $data['frontname'] = '';
        }

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        // get category
        $this->load->model('catalog/category');
        $data['all_categorys'] = array();
        $data['all_categorys']['all']['category_id'] = 'all';
        $data['all_categorys']['all']['name'] = 'All categorys';
        $data['all_categorys']['all']['selected'] = '';
        // get all category_
        $all_categorys_informations = $this->model_catalog_category->getCategories();
        foreach ($all_categorys_informations as $all_categorys_information) {
            $data['all_categorys'][$all_categorys_information['category_id']] = array(
                'category_id' => $all_categorys_information['category_id'],
                'name' => $all_categorys_information['name'],
                'selected' => ""
            );
        }
        //$data['all_categorys'][$all_categorys_information['category_id']]
        if (isset($this->request->post['select_category']) && !empty($this->request->post['select_category'])) {
            $data['all_categorys'][$this->request->post['select_category']]['selected'] = 'selected="selected"';
        } elseif (!empty($module_info)) {
            $data['all_categorys'][$module_info['select_category']]['selected'] = 'selected="selected"';
        } else {
            $data['all_categorys']['all']['selected'] = 'selected="selected"';
        }
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

		if (isset($this->request->post['limit'])) {
			$data['limit'] = $this->request->post['limit'];
		} elseif (!empty($module_info)) {
			$data['limit'] = $module_info['limit'];
		} else {
			$data['limit'] = 5;
		}

		if (isset($this->request->post['width'])) {
			$data['width'] = $this->request->post['width'];
		} elseif (!empty($module_info)) {
			$data['width'] = $module_info['width'];
		} else {
			$data['width'] = 200;
		}

		if (isset($this->request->post['height'])) {
			$data['height'] = $this->request->post['height'];
		} elseif (!empty($module_info)) {
			$data['height'] = $module_info['height'];
		} else {
			$data['height'] = 200;
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($module_info)) {
			$data['status'] = $module_info['status'];
		} else {
			$data['status'] = '';
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/productshow', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/productshow')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64)) {
			$this->error['name'] = $this->language->get('error_name');
		}

        if ((utf8_strlen($this->request->post['frontname']) < 3) || (utf8_strlen($this->request->post['frontname']) > 64)) {
            $this->error['frontname'] = $this->language->get('fronterror_name');
        }

		if (!$this->request->post['width']) {
			$this->error['width'] = $this->language->get('error_width');
		}

		if (!$this->request->post['height']) {
			$this->error['height'] = $this->language->get('error_height');
		}

		return !$this->error;
	}
}
