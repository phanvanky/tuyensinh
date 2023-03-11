<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2021 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_IS_FILE_MODULES')) {
    exit('Stop!!!');
}

$sql_drop_module = [];

$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . ';';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_config;';

$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_user_notification';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_priority_group';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_nation;';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_category_school';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_address';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_Student_profile_status';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_Student_Profile_Detail';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_Student_Profile';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_School_detail';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_School';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_Priority_object';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_Notification';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_Channel';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_majors';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_Admissions';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_users';





$sql_create_module = $sql_drop_module;




$sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_users (
    id varchar(255) NOT NULL,
  active bit(1) DEFAULT NULL,
  created_by varchar(255) DEFAULT NULL,
  created_date datetime DEFAULT NULL,
  district_name varchar(255) DEFAULT NULL,
  province_name varchar(255) DEFAULT NULL,
  updated_by varchar(255) DEFAULT NULL,
  updated_date datetime DEFAULT NULL,
  user_id varchar(255) DEFAULT NULL,
  ward_code varchar(255) DEFAULT NULL,
  ward_name varchar(255) DEFAULT NULL,
  address_detail varchar(255) DEFAULT NULL,
  district_id varchar(255) DEFAULT NULL,
  province_id varchar(255) DEFAULT NULL,

  ADD PRIMARY KEY (id),
  ADD KEY user_id (user_id);
   )ENGINE=MyISAM';

$sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_users (
    id varchar(255) NOT NULL,
  active bit(1) DEFAULT NULL,
  created_by varchar(255) DEFAULT NULL,
  created_date datetime DEFAULT NULL,
  district_name varchar(255) DEFAULT NULL,
  province_name varchar(255) DEFAULT NULL,
  updated_by varchar(255) DEFAULT NULL,
  updated_date datetime DEFAULT NULL,
  user_id varchar(255) DEFAULT NULL,
  ward_code varchar(255) DEFAULT NULL,
  ward_name varchar(255) DEFAULT NULL,
  address_detail varchar(255) DEFAULT NULL,
  district_id varchar(255) DEFAULT NULL,
  province_id varchar(255) DEFAULT NULL,
  
  ADD PRIMARY KEY (id),
  ADD KEY user_id (user_id);
   )ENGINE=MyISAM';

   $sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_user_notification   (
    id varchar(255) NOT NULL,
	notification_id varchar(255) NULL,		
	user_id varchar(255) NULL,
	CONSTRAINT user_notification PRIMARY KEY (id),
    CONSTRAINT fk_user_notification FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT fk_user_notification FOREIGN KEY(notification_id) REFERENCES notification(id)
   )ENGINE=MyISAM';

   $sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_priority_group (
    id varchar(255) NOT NULL,
	name varchar(255) NULL,			
	des varchar(255) NULL,			
	priority_point varchar(255) NULL,	
	created_by varchar(255) NULL,		
	created_date datetime NULL,		
	active bit NULL,			
	user_id varchar(255) NULL,		
	CONSTRAINT priority_group PRIMARY KEY (id),
    CONSTRAINT fk_priority_group FOREIGN KEY(user_id) REFERENCES users(id)
   )ENGINE=MyISAM';

   $sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_nation (
    id varchar(255) NOT NULL,		
	name varchar(255) NULL,			/*Tên dân tộc*/
	des varchar(500) NULL,			/*Mô tả*/
	active bit NULL,			/*Trạng thái*/
	CONSTRAINT nation_pkey PRIMARY KEY (id)
   )ENGINE=MyISAM';

   $sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_category_school (
    id varchar(255) NOT NULL,		/*Tạo bảng danh mục trường học*/
	name varchar(255) NULL,			/*Tên danh mục trường học*/
	des varchar(255) NULL,			/*Mô tả danh mục*/
	slug varchar(255) NULL,			/*kí hiệu đặc biệt để lấy danh mục khi call ở giao diện*/
	created_by varchar(255) NULL,		/*Người tạo danh mục*/
	created_date datetime NULL,		/*Ngày tạo danh mục*/
	active bit NULL,			/*Trạng thái danh mục*/
	CONSTRAINT pkey_category_school PRIMARY KEY (id)
   )ENGINE=MyISAM';

   $sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_address (
    id varchar(255) NOT NULL,
	active bit NULL,			/*Trạng thái địa chỉ*/
	created_by varchar(255) NULL,		/*Người tạo địa chỉ*/
	created_date datetime NULL,		/*Ngày tạo địa chỉ*/
	district_name varchar(255) NULL,	/*Tên quận*/
	province_name varchar(255) NULL,	/*Tên tỉnh*/
	updated_by varchar(255) NULL,		/*Cập nhật bởi ai*/
	updated_date datetime NULL,		/*Ngày cập nhật*/
	user_id varchar(255) NULL,		/*ID người dùng*/
	ward_code varchar(255) NULL,		/*Mã phường*/
	ward_name varchar(255) NULL,		/*Tên phường*/
	address_detail varchar(255) NULL,	/*Chi tiết địa chỉ*/
	district_id varchar(255) NULL,		/*id quận*/
	province_id varchar(255) NULL,		/*id tỉnh*/
	CONSTRAINT address PRIMARY KEY (id),
    CONSTRAINT fk_address FOREIGN KEY(user_id) REFERENCES users(id)
   )ENGINE=MyISAM';

   $sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_Student_profile_status (
    id varchar(255) NOT NULL,
	Student_profile_id varchar(255) NULL,	/*id hồ sơ*/
	note varchar(255) NULL,			/*Ghi chú*/	
	status varchar(255) NULL,		/*Trạng thái*/
	address_id varchar(255) NULL,		/*Địa chỉ trả hồ sơ nếu có*/	
	created_by varchar(255) NULL,		/*Người tạo trạng thái */
	created_date datetime NULL,		/*Ngày tạo*/
	CONSTRAINT Student_profile_status PRIMARY KEY (id),
    
CONSTRAINT fk_Student_profile_status FOREIGN KEY(address_id) REFERENCES address(id),
CONSTRAINT fk_Student_profile_status FOREIGN KEY(Student_Profile_id) REFERENCES Student_Profile(id)
   )ENGINE=MyISAM';

   $sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_Student_Profile_Detail (
    id varchar(255) NOT NULL,
	Student_Profile_id varchar(255) NULL,			/*ID hồ sơ tuyển sinh*/
	citizen_identification varchar(255) NULL,		/*Số CMT/CCCD*/
	Graduation_year varchar(255) NULL,			/*Năm tốt nghiệp*/
	Student_image varchar(255) NULL,			/*Ảnh sinh viên/học sinh*/
	Aspirations varchar(255) NULL,				/*Nguyện vọng*/
	school_report_photo varchar(255) NULL,			/*ảnh photo bằng tốt nghiệp*/
	Point_graduated varchar(255) NULL,			/*Điểm tốt nghiệp*/
	name_of_school_graduated varchar(255) NULL,		/*Tên trường tốt nghiệp*/			
	created_by varchar(255) NULL,				/*người tạo*/
	created_date datetime NULL,				/*Ngày tạo*/
	active bit NULL,						/*Trạng thái*/
	Priority_object_ID varchar(255) NULL,			/*ID đối tượng ưu tiên cộng điểm*/
	priority_group_ID varchar(255) NULL,			/*ID nhóm ưu tiên cộng điểm*/
	CONSTRAINT Student_Profile_Detail PRIMARY KEY (id),
    CONSTRAINT fk_Student_Profile_Detail FOREIGN KEY(Priority_object_ID) REFERENCES Priority_object(id),
CONSTRAINT fk_Student_Profile_Detail FOREIGN KEY(priority_group_ID) REFERENCES priority_group(id),
   )ENGINE=MyISAM';

   $sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_Student_Profile (
    id varchar(255) NOT NULL,
	Student_name varchar(255) NULL,				/*Tên sinh viên*/
	Birthday datetime NULL,					/*Ngày tháng năm sinh*/
	Gender varchar(255) NULL,				/*Giới tính*/
	Phone varchar(255) NULL,				/*Số điện thoại*/
	nation_ID varchar(255) NULL,				/*ID dân tộc*/
	email varchar(255) NULL,				/*email*/
	address_id varchar(255) NULL,				/*ID địa chỉ*/
	created_by varchar(255) NULL,				/*Người tạo*/
	created_date datetime NULL,				/*Ngày tạo*/
	note varchar(500) NULL,					/*Ghi chú*/
	updated_by varchar(255) NULL,				/*Người cập nhật*/
	updated_date timestamp NULL,				/*Ngày cập nhật*/
	user_id varchar(255) NULL,				/*ID người tạo*/
	status varchar(255) NULL,				/*Trạng thái*/	
	CONSTRAINT Student_Profile PRIMARY KEY (id),
    CONSTRAINT fk_Student_Profile FOREIGN KEY(nation_id) REFERENCES Nation(id),
    CONSTRAINT fk_Student_Profile FOREIGN KEY(address_id) REFERENCES address(id),
    CONSTRAINT fk_Student_Profile FOREIGN KEY(user_id) REFERENCES users(id)
   )ENGINE=MyISAM';

   $sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_School_detail (
    id varchar(255) NOT NULL,				
	School_code varchar(255) NULL,				/*Mã trường*/	
	Admissions_ID varchar(255) NULL,			/*ID tuyển sinh*/
	Number_of_Student varchar(255) NULL,			/*Số lượng sinh viên tuyển sinh*/
	majors_ID varchar(255) NULL,				/*ID ngành học*/
	active bit NULL,					/*Trạng thái*/
	CONSTRAINT School_detail PRIMARY KEY (id)
    CONSTRAINT fk_School_detail FOREIGN KEY(Admissions_ID) REFERENCES Admissions(id),
    CONSTRAINT fk_School_detail FOREIGN KEY(majors_ID) REFERENCES majors(id)
   )ENGINE=MyISAM';

   $sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_School (
    id varchar(255) NOT NULL,
	Name varchar(255) NULL,					/*Tên trường*/
	Address_ID varchar(255) NULL,				/*ID địa chỉ*/
	PhoneNumber varchar(255) NULL,				/*Số điện thoại của trường*/
	website varchar(255) NULL,				/*Website trường*/
	Email varchar(255) NULL,				/*Email trường*/
	Departmen varchar(255) NULL,				/*Thuộc phòng giáo dục của tỉnh nào*/
	Active bit NULL,					/*Trạng thái*/
	Des varchar(500) NULL,					/*Mô tả trường*/
	Category_school_ID varchar(500) NULL,			/*ID danh mục trường*/
	CONSTRAINT School PRIMARY KEY (id)
    CONSTRAINT fk_School FOREIGN KEY(Address_ID) REFERENCES address(id),
CONSTRAINT fk_School FOREIGN KEY(Category_school_ID) REFERENCES category_school(id)
   )ENGINE=MyISAM';

   $sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_Priority_object (
    id varchar(255) NOT NULL,
	name varchar(255) NULL,					/*Tên đối tượng ưu tiên*/
	priority_point varchar(255) NULL,			/*Điểm được cộng*/
	nation_id varchar(255) NULL,				/*id dân tộc*/
	des varchar(255) NULL,					/*Mô tả*/
	active bit NULL,					/*Trạng thái*/
	created_by varchar(255) NULL,				/*Người tạo*/
	created_date datetime NULL,				/*Ngày tạo*/	
	user_id varchar(255) NULL,				/*ID người dùng*/
	CONSTRAINT Priority_object PRIMARY KEY (id)
    CONSTRAINT fk_Priority_object FOREIGN KEY(nation_id) REFERENCES Nation(id),
    CONSTRAINT fk_Priority_object FOREIGN KEY(user_id) REFERENCES users(id)

   )ENGINE=MyISAM';

   $sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_Notification (
    id varchar(255) NOT NULL,					
	content varchar(255) NULL,				/*Chi tiết thông báo*/
	user_id varchar(255) NULL,				/*ID người được thông báo*/
	is_read bit NULL,					/*Trạng thái đã đọc hay chưa*/
	created_date datetime NULL,				/*Ngày tạo thông báo*/
	CONSTRAINT Notification PRIMARY KEY (id)
   )ENGINE=MyISAM';

   $sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_Channel (
    id varchar(255) NOT NULL,			
	name varchar(255) NULL,					/*Tên kênh thông tin*/
	des varchar(255) NULL,					/*Mô tả kênh thông tin*/
	active bit NULL,					/*Trạng thái*/	
	created_by varchar(255) NULL,				/*Người tạo*/	
	created_date datetime NULL,				/*Ngày tạo*/
	CONSTRAINT pkey_Channel PRIMARY KEY (id)
   )ENGINE=MyISAM';

   $sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_majors (
    id varchar(255) NOT NULL,
	Name varchar(255) NULL,					/*Tên ngành học*/	
	Specialized varchar(255) NULL,				/*Tên chuyên ngành*/						
	Des varchar(255) NULL,					/*Mô tả*/
	created_by varchar(255) NULL,				/*Người tạo*/
	created_date datetime NULL,				/*Ngày tạo*/
	active bit NULL,					/*Trạng thái*/
	CONSTRAINT majors PRIMARY KEY (id)
   )ENGINE=MyISAM';

   $sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_Admissions (
    id varchar(255) NOT NULL,
	number_of_Student varchar(255) NULL,			/*số lượng tuyển sinh*/
	Year_of_Admissions varchar(255) NULL,			/*Năm tuyển sinh*/	
	Active bit NULL,					/*Trạng thái*/
	CONSTRAINT Admissions PRIMARY KEY (id)
   )ENGINE=MyISAM';











$sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . " (
 id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
 title varchar(250) NOT NULL,
 alias varchar(250) NOT NULL,
 image varchar(255) DEFAULT '',
 imagealt varchar(255) DEFAULT '',
 imageposition tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
 description text,
 bodytext mediumtext NOT NULL,
 keywords text,
 socialbutton tinyint(4) NOT NULL DEFAULT '0',
 activecomm varchar(255) DEFAULT '',
 layout_func varchar(100) DEFAULT '',
 weight smallint(4) NOT NULL DEFAULT '0',
 admin_id mediumint(8) unsigned NOT NULL DEFAULT '0',
 add_time int(11) NOT NULL DEFAULT '0',
 edit_time int(11) NOT NULL DEFAULT '0',
 status tinyint(1) unsigned NOT NULL DEFAULT '0',
 hitstotal MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
 hot_post TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
 PRIMARY KEY (id),
 UNIQUE KEY alias (alias)
) ENGINE=MyISAM";

$sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_config (
 config_name varchar(30) NOT NULL,
 config_value varchar(255) NOT NULL,
 UNIQUE KEY config_name (config_name)
)ENGINE=MyISAM';

$sql_create_module[] = 'INSERT INTO ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . "_config VALUES
('viewtype', '0'),
('facebookapi', ''),
('per_page', '20'),
('news_first', '0'),
('related_articles', '5'),
('copy_page', '0'),
('alias_lower', 1),
('socialbutton', 'facebook,twitter')
";

// Comments
$sql_create_module[] = 'INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'auto_postcomm', '1')";
$sql_create_module[] = 'INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'allowed_comm', '-1')";
$sql_create_module[] = 'INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'view_comm', '6')";
$sql_create_module[] = 'INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'setcomm', '4')";
$sql_create_module[] = 'INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'activecomm', '1')";
$sql_create_module[] = 'INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'emailcomm', '0')";
$sql_create_module[] = 'INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'adminscomm', '')";
$sql_create_module[] = 'INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'sortcomm', '0')";
$sql_create_module[] = 'INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'captcha_area_comm', '1')";
$sql_create_module[] = 'INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'perpagecomm', '5')";
$sql_create_module[] = 'INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'timeoutcomm', '360')";
$sql_create_module[] = 'INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'allowattachcomm', '0')";
$sql_create_module[] = 'INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'alloweditorcomm', '0')";
