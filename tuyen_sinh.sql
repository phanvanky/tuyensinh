Create database tuyen_sinh; /*Tạo DB tên tuyen_sinh*/

use tuyen_sinh; /*Sử dụng db tuyen_sinh*/

CREATE TABLE users		/*Tạo bảng người dùng*/
(
	 id varchar(255) NOT NULL,
 	First_name varchar(255) NULL, 		/*Tên chính */
 	Last_name varchar(255) NULL,		 /* Tên đệm*/
 	Gender bit NULL,			/*Giới tính*/
 	Password varchar(255) NULL,		/*mật khẩu*/
 	Phone varchar(15) NULL,			/*Số điện thoại*/
 	birthday datetime NULL,			/*Ngày sinh*/
 	email varchar(255) NULL,		/*Email*/
 	created_by varchar(255) NULL,		/*tạo bởi ai*/
 	created_date datetime NULL, 		/*ngày tạo tài khoản*/
	active bit NULL, 			/*Trạng thái*/
	CONSTRAINT pkey_users PRIMARY KEY (id)
 );

CREATE TABLE user_notification /*Bảng thông báo cho người dùng*/
 (
	id varchar(255) NOT NULL,
	notification_id varchar(255) NULL,		
	user_id varchar(255) NULL,
	CONSTRAINT user_notification PRIMARY KEY (id)

);

CREATE TABLE priority_group			 /*Tạo bảng nhóm ưu tiên*/
(
	id varchar(255) NOT NULL,
	name varchar(255) NULL,			/*Tên nhóm ưu tiên*/
	des varchar(255) NULL,			/*Mô tả nhóm*/
	priority_point varchar(255) NULL,	/*Số điểm ưu tiên*/
	created_by varchar(255) NULL,		/*Người tạo nhóm ưu tiên*/
	created_date datetime NULL,		/*Ngày tạo nhóm ưu tiên*/
	active bit NULL,			/*Trạng thái nhóm ưu tiên*/
	user_id varchar(255) NULL,		/*Khoá ngoại user */
	CONSTRAINT priority_group PRIMARY KEY (id)
);

CREATE TABLE nation (				/*Tạo bảng dân tộc*/
	id varchar(255) NOT NULL,		
	name varchar(255) NULL,			/*Tên dân tộc*/
	des varchar(500) NULL,			/*Mô tả*/
	active bit NULL,			/*Trạng thái*/
	CONSTRAINT nation_pkey PRIMARY KEY (id)
);

CREATE TABLE category_school (
	id varchar(255) NOT NULL,		/*Tạo bảng danh mục trường học*/
	name varchar(255) NULL,			/*Tên danh mục trường học*/
	des varchar(255) NULL,			/*Mô tả danh mục*/
	slug varchar(255) NULL,			/*kí hiệu đặc biệt để lấy danh mục khi call ở giao diện*/
	created_by varchar(255) NULL,		/*Người tạo danh mục*/
	created_date datetime NULL,		/*Ngày tạo danh mục*/
	active bit NULL,			/*Trạng thái danh mục*/
	CONSTRAINT pkey_category_school PRIMARY KEY (id)
);

	
CREATE TABLE address (				/*Tạo bảng địa chỉ*/
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
	CONSTRAINT address PRIMARY KEY (id)
);


CREATE TABLE Student_profile_status (		/*Tạo bảng trạng thái hồ sơ tuyển sinh*/
	id varchar(255) NOT NULL,
	Student_profile_id varchar(255) NULL,	/*id hồ sơ*/
	note varchar(255) NULL,			/*Ghi chú*/	
	status varchar(255) NULL,		/*Trạng thái*/
	address_id varchar(255) NULL,		/*Địa chỉ trả hồ sơ nếu có*/	
	created_by varchar(255) NULL,		/*Người tạo trạng thái */
	created_date datetime NULL,		/*Ngày tạo*/
	CONSTRAINT Student_profile_status PRIMARY KEY (id)
);


CREATE TABLE Student_Profile_Detail (				/*Tạo bảng chi tiết hồ sơ tuyển sinh*/
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
	CONSTRAINT Student_Profile_Detail PRIMARY KEY (id)
);


CREATE TABLE Student_Profile (					/*Tạo bảng hồ sơ sinh viên-học sinh*/
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
	CONSTRAINT Student_Profile PRIMARY KEY (id)
);

CREATE TABLE School_detail (					/*Tạo bảng chi tiết trường */
	id varchar(255) NOT NULL,				
	School_code varchar(255) NULL,				/*Mã trường*/	
	Admissions_ID varchar(255) NULL,			/*ID tuyển sinh*/
	Number_of_Student varchar(255) NULL,			/*Số lượng sinh viên tuyển sinh*/
	majors_ID varchar(255) NULL,				/*ID ngành học*/
	active bit NULL,					/*Trạng thái*/
	CONSTRAINT School_detail PRIMARY KEY (id)
);


CREATE TABLE School (						/*Tạo bảng trường học*/
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
);


CREATE TABLE Priority_object (					/*Tạo bảng đối tượng ưu tiên: lưu những thông tin về các trường hợp học sinh/sinh viên được cộng điểm ưu tiên*/
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
);

CREATE TABLE Notification (					/*Tạo bảng thông báo*/
	id varchar(255) NOT NULL,					
	content varchar(255) NULL,				/*Chi tiết thông báo*/
	user_id varchar(255) NULL,				/*ID người được thông báo*/
	is_read bit NULL,					/*Trạng thái đã đọc hay chưa*/
	created_date datetime NULL,				/*Ngày tạo thông báo*/
	CONSTRAINT Notification PRIMARY KEY (id)
);

CREATE TABLE Channel (						/*Tạo bảng kênh thông tin mà phụ huynh/học sinh biết đến tuyển sinh */
	id varchar(255) NOT NULL,			
	name varchar(255) NULL,					/*Tên kênh thông tin*/
	des varchar(255) NULL,					/*Mô tả kênh thông tin*/
	active bit NULL,					/*Trạng thái*/	
	created_by varchar(255) NULL,				/*Người tạo*/	
	created_date datetime NULL,				/*Ngày tạo*/
	CONSTRAINT pkey_Channel PRIMARY KEY (id)
);


CREATE TABLE majors (						/*Tạo bảng ngành học*/
	id varchar(255) NOT NULL,
	Name varchar(255) NULL,					/*Tên ngành học*/	
	Specialized varchar(255) NULL,				/*Tên chuyên ngành*/						
	Des varchar(255) NULL,					/*Mô tả*/
	created_by varchar(255) NULL,				/*Người tạo*/
	created_date datetime NULL,				/*Ngày tạo*/
	active bit NULL,					/*Trạng thái*/
	CONSTRAINT majors PRIMARY KEY (id)
);

CREATE TABLE Admissions (					/*Tạo bảng tuyển sinh*/
	id varchar(255) NOT NULL,
	number_of_Student varchar(255) NULL,			/*số lượng tuyển sinh*/
	Year_of_Admissions varchar(255) NULL,			/*Năm tuyển sinh*/	
	Active bit NULL,					/*Trạng thái*/
	CONSTRAINT Admissions PRIMARY KEY (id)
);


ALTER TABLE Priority_object ADD FOREIGN KEY(nation_id) REFERENCES Nation(id);

ALTER TABLE School ADD FOREIGN KEY(Address_ID) REFERENCES address(id);
ALTER TABLE School ADD FOREIGN KEY(Category_school_ID) REFERENCES category_school(id);

ALTER TABLE School_detail ADD FOREIGN KEY(Admissions_ID) REFERENCES Admissions(id);
ALTER TABLE School_detail ADD FOREIGN KEY(majors_ID) REFERENCES majors(id);

ALTER TABLE Student_Profile ADD FOREIGN KEY(nation_id) REFERENCES Nation(id);
ALTER TABLE Student_Profile ADD FOREIGN KEY(address_id) REFERENCES address(id);
ALTER TABLE Student_Profile ADD FOREIGN KEY(user_id) REFERENCES users(id);

ALTER TABLE Student_Profile_Detail ADD FOREIGN KEY(Priority_object_ID) REFERENCES Priority_object(id);
ALTER TABLE Student_Profile_Detail ADD FOREIGN KEY(priority_group_ID) REFERENCES priority_group(id);

ALTER TABLE Student_profile_status ADD FOREIGN KEY(address_id) REFERENCES address(id);
ALTER TABLE Student_profile_status ADD FOREIGN KEY(Student_Profile_id) REFERENCES Student_Profile(id);

ALTER TABLE priority_group ADD FOREIGN KEY(user_id) REFERENCES users(id);

ALTER TABLE address ADD FOREIGN KEY(user_id) REFERENCES users(id);

ALTER TABLE user_notification ADD FOREIGN KEY(user_id) REFERENCES users(id);
ALTER TABLE user_notification ADD FOREIGN KEY(notification_id) REFERENCES notification(id);
