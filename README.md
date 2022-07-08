 ## api paths  
 
 ### /api/documentation/v1  
 *Swagger документация методов [Notebook Api](https://github.com/drive-knight/laravel-notebook-api/blob/master/storage/api-docs/api-docs-v1.json)*  
 
 ![](https://github.com/drive-knight/laravel-notebook-api/blob/master/maxresdefault.jpg)
  
 ### /api/v1/notebook{?page={p}&per_page={pp}}  
 **Разрешенные методы:** GET  
 **Параметры**:  
 "Необязательные": 	{"p": int, "pp": int}  *Если параметры не указаны, по умолчанию page=1, per_page=50  
 *Получить все записи* 
 
 ### /api/v1/notebook  
 **Разрешенные методы:** POST  
 **Параметры**:  
 "Обязательные": 	{"full_name: "varchar60", "phone": "varchar14|min5|integer", "email": "varchar60|email"}  
 "Необязательные": 	{"company": "varchar60", "date_of_birth": "date|YY-mm-dd", "photo_path": "varchar"}  
 *Добавить запись*  
 
 ### /api/v1/notebook/{id}  
 **Разрешенные методы:** GET  
 **Параметры**:  
 "Обязательные": 	{"id": int}  
 *Получить выбранную запись*  
 
 ### /api/v1/notebook/{id}  
 **Разрешенные методы:** PUT/PATCH  
 **Параметры**:  
 "Обязательные":	{"full_name: "varchar60", "phone": "varchar14|min5|integer", "email": "varchar60|email"}  
 "Необязательные": 	{"company": "varchar60", "date_of_birth": "date|YY-mm-dd", "photo_path": "varchar"}  
 *Редактировать выбранную запись*  

 ### /api/v1/notebook/{id}  
 **Разрешенные методы:** DELETE  
 **Параметры**:  
 "Обязательные": 	{"id": int}  
 *Удалить выбранную запись*  
 
