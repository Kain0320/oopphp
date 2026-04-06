<?php

class User 
{
    protected static $instance;
    
//     function __construct($argument)
//  {

//  }
    public static function action()
    {
        if(!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function create($POST)
    {
      $errors = array();
      $arr['username'] = ucwords(trim($POST['username']));
      $arr['password'] = $POST['password'];
      $arr['email'] = strtolower($POST['email']);
      $arr['gender'] = $POST['gender'];
      $arr['date'] = date("Y-m-d H:i:s");

      //validation
      if(empty($arr['username']) || !preg_match('/^[a-zA-Z ]+$/', $arr['username']))
      {
           $errors[] = 'Username can only have letters and spaces';
      }
      if(!filter_var($arr['email'], FILTER_VALIDATE_EMAIL))
      {
           $errors[] = 'Please enter a valid email address';
      }
      if(!filter_var($arr['password']) || strlen($arr['password']) < 4)
      {
           $errors[] = 'Password must be at least 4 characters long';
      }

      if($arr['gender'] == "--Choose gender--" || ($arr['gender'] != "Female" && $arr["gender"] != "Male"))
      {
           $errors[] = 'Please enter a valid gender';
      }
      
      //save to database
      if(count($errors) == 0)
      {     
        return DB::table("users")->insert($arr); 
     
      }
      return $errors;
    }

    public function login($POST)
    {
      $errors = array();
      
      $arr['email'] = trim($POST['email']);
      $password= $POST['password'];

      //read from database
      $data = DB::table("users")->select()->where("email= :email", $arr);
      if(is_array($data))
      {     
        $data = $data[0];
        if($data->password == $password)
        {
            $ses = new Session();
            $ses->regenerate();

            $arr['username'] = $data->username;
            $arr['email'] = $data->email;
            $arr['logged_in'] = 1;

            $ses->set('USER', $arr);
            return true;

        }
      }
      $errors[] = "Invalid email or password";
      return $errors;
    }

    public function is_logged_in()
    {
        $ses = new Session();

        if($ses->exists('USER'))
        {
            $data = $ses->get('USER');
            $email = $data['email'];

            //read from database
            $data = $this->get_by_email($email);
            if(is_array($data))
            {    
                return true;
            }
        }
        return false;

    } 
    
    

    public function update_by_id($id, $values)
    {
        return DB::table("users")->update($values)->where('id = :id', ['id' => $id]);
    }
    public function where($where, $values)
    {
        return DB::table('users')->select()->where($where, $values);
    }

    public function get_all()
    {
    return DB::table('users')->select()->all();
    }
 
    /*
    * get data using provided column name 
    */
    public function __call($function, $params)
    {
        $value = $params[0]; 
        $column = str_replace("get_by_", "", $function);
        $column = addslashes($column);

        //check if column exists in the database
        $check = DB::table("users")->query('SHOW COLUMNS FROM users');

        $all_columns = array_column($check, 'Field');
        if (in_array($column, $all_columns)) {
            return DB::table("users")->select()->where($column . " = :" . $column, [$column => $value]);
        } 
        return false;
    } 
}