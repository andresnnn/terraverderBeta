<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - English
*
* Author: Ben Edmunds
*         ben.edmunds@gmail.com
*         @benedmunds
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.14.2010
*
* Description:  English language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful']            = 'Cuenta satisfactoriamente creada';
$lang['account_creation_unsuccessful']          = 'Inhabilitado para crear cuenta';
$lang['account_creation_duplicate_email']       = 'Email actualmente en uso o inválido';
$lang['account_creation_duplicate_identity']    = 'Usuario ya en uso o inválido';
$lang['account_creation_missing_default_group'] = 'El tipo de usuario no existe';
$lang['account_creation_invalid_default_group'] = 'Tipo de usuario inválido';


// Password
$lang['password_change_successful']          = 'Contraseña cambiada satisfactoriamente';
$lang['password_change_unsuccessful']        = 'No se puede cambiar la contraseña';
$lang['forgot_password_successful']          = 'Contraseña reiniciada, chequee su casilla de email';
$lang['forgot_password_unsuccessful']        = 'No se puede reiniciar la contraseña';

// Activation
$lang['activate_successful']                 = 'Cuenta activada';
$lang['activate_unsuccessful']               = 'Inhabilitado para activar la cuenta';
$lang['deactivate_successful']               = 'Cuenta desactivada';
$lang['deactivate_unsuccessful']             = 'Inhabilitado para desactivar cuenta';
$lang['activation_email_successful']         = 'Mail de activación enviado';
$lang['activation_email_unsuccessful']       = 'No se pudo enviar el mail de activación';

// Login / Logout
$lang['login_successful']                    = 'Acceso satisfactorio';
$lang['login_unsuccessful']                  = 'Acceso denegado';
$lang['login_unsuccessful_not_active']       = 'La cuenta se encuentra inactiva';
$lang['login_timeout']                       = 'Temporalmente bloqueado. Intentar más tarde.';
$lang['logout_successful']                   = 'Salida del sistema satisfactoria';

// Account Changes
$lang['update_successful']                   = 'Account Information Successfully Updated';
$lang['update_unsuccessful']                 = 'Unable to Update Account Information';
$lang['delete_successful']                   = 'User Deleted';
$lang['delete_unsuccessful']                 = 'Unable to Delete User';

// Groups
$lang['group_creation_successful']           = 'Group created Successfully';
$lang['group_already_exists']                = 'Group name already taken';
$lang['group_update_successful']             = 'Group details updated';
$lang['group_delete_successful']             = 'Group deleted';
$lang['group_delete_unsuccessful']           = 'Unable to delete group';
$lang['group_delete_notallowed']             = 'Can\'t delete the administrators\' group';
$lang['group_name_required']                 = 'Group name is a required field';
$lang['group_name_admin_not_alter']          = 'Admin group name can not be changed';

// Activation Email
$lang['email_activation_subject']            = 'Account Activation';
$lang['email_activate_heading']              = 'Activate account for %s';
$lang['email_activate_subheading']           = 'Please click this link to %s.';
$lang['email_activate_link']                 = 'Activate Your Account';

// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'Forgotten Password Verification';
$lang['email_forgot_password_heading']       = 'Reset Password for %s';
$lang['email_forgot_password_subheading']    = 'Please click this link to %s.';
$lang['email_forgot_password_link']          = 'Reset Your Password';

// New Password Email
$lang['email_new_password_subject']          = 'New Password';
$lang['email_new_password_heading']          = 'New Password for %s';
$lang['email_new_password_subheading']       = 'Your password has been reset to: %s';
