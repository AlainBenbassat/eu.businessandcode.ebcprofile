<?php

require_once 'ebcprofile.civix.php';
use CRM_Ebcprofile_ExtensionUtil as E;

function ebcprofile_civicrm_postProcess($formName, &$form) {
  // check if it's the profile EBC Communication (id = 32)
  if (is_a($form, 'CRM_Profile_Form_Contact')) {
    $gid = $form->getVar('_gid');
    if ($gid == 32) {
      // get the contact id
      $contactID = $form->getVar('_id');
      if ($contactID) {
        // create an activity
        $p = [
          'activity_type_id' => 67, // online contact update
          'subject' => 'EBC Communication Preferences',
          'activity_date_time' => date('YmdHis'),
          'is_test' => 0,
          'status_id' => 2, // completed
          'priority_id' => 2,
          'details' => '',
          'source_contact_id' => $contactID,
          'target_contact_id' => $contactID,
        ];
        CRM_Activity_BAO_Activity::create($p);
      }
    }
  }
}

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function ebcprofile_civicrm_config(&$config) {
  _ebcprofile_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function ebcprofile_civicrm_xmlMenu(&$files) {
  _ebcprofile_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function ebcprofile_civicrm_install() {
  _ebcprofile_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function ebcprofile_civicrm_postInstall() {
  _ebcprofile_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function ebcprofile_civicrm_uninstall() {
  _ebcprofile_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function ebcprofile_civicrm_enable() {
  _ebcprofile_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function ebcprofile_civicrm_disable() {
  _ebcprofile_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function ebcprofile_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _ebcprofile_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function ebcprofile_civicrm_managed(&$entities) {
  _ebcprofile_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function ebcprofile_civicrm_caseTypes(&$caseTypes) {
  _ebcprofile_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function ebcprofile_civicrm_angularModules(&$angularModules) {
  _ebcprofile_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function ebcprofile_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _ebcprofile_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function ebcprofile_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function ebcprofile_civicrm_navigationMenu(&$menu) {
  _ebcprofile_civix_insert_navigation_menu($menu, NULL, array(
    'label' => E::ts('The Page'),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _ebcprofile_civix_navigationMenu($menu);
} // */
