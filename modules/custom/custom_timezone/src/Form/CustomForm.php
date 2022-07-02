<?php  
/**  
 * @file  
 * Contains Drupal\custom_timezone\Form\CustomForm.  
 */  
namespace Drupal\custom_timezone\Form;  
use Drupal\Core\Form\ConfigFormBase;  
use Drupal\Core\Form\FormStateInterface;  
  
class CustomForm extends ConfigFormBase {  
  /**  
   * {@inheritdoc}  
   */  
  protected function getEditableConfigNames() {  
    return [  
      'custom_timezone.adminsettings',  
    ];  
  }  
  
  /**  
   * {@inheritdoc}  
   */  
  public function getFormId() {  
    return 'custom_timezone_form';  
  }  

   /**  
   * {@inheritdoc}  
   */  
  public function buildForm(array $form, FormStateInterface $form_state) {  
    $config = $this->config('custom_timezone.adminsettings');  
  
    $form['country'] = [ 
        '#type' => 'textfield',
        '#title' => $this->t('Country'),
        '#default_value' => $config->get('country'),
    ]; 
    
    $form['city'] = [ 
      '#type' => 'textfield',
      '#title' => $this->t('City'),
      '#default_value' => $config->get('City'),
  ];

  $form['Timezone '] = array(
    '#title' => t('Timezone'),
    '#type' => 'select',
    '#options' => array(t('--- SELECT ---'), t('America/Chicago'), t('America/New_York'), t('Asia/Tokyo') ,t('Asia/Dubai'),
    t('Europe/Amsterdam'), t('Europe/Oslo'), t('Europe/London')),
  );
  
    return parent::buildForm($form, $form_state);  
  }  

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('custom_timezone.settings');
    $config->set('custom_timezonesettings', $form_state->getValue('custom_timezonesettings'));
    $config->save();
    parent::submitForm($form, $form_state);
  }

}  


