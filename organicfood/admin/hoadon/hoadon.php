<?php
    require_once '../db/database.php';
    require_once '../db/format.php';
?>



<?php
    class hoadon
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        

        public function show_hoadon()
        {
            $query = "SELECT * FROM cart,user ";
            $result = $this->db->select($query);
            return $result;
        }


        public function show_chitiethoadon($id)
        {

            $query = "SELECT * FROM cart, cart_details,user WHERE cart.id = cart_details.id_cart AND cart.id_khachhang = user.id AND cart.id = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_chitiethoadon2($id)
        {

            $query="SELECT * FROM cart_details WHERE id_cart ='$id'";
            $result = $this->db->select($query);
            return $result;
        }
            
        public function show_hoadonPhanTrang()
        {
            //Phân trang
            $sanPhamTungTrang = 10; //Sản phẩm từng trang

            if (!isset($_GET['trang'])){
                    $trang = 1;
            }else{
                    $trang = $_GET['trang'];
            }
            $tungTrang = ($trang - 1) * $sanPhamTungTrang; //Vị trí bắt đầu $trang

            //Search và show
           if (isset($_GET['wordSearch']) && !empty($_GET['wordSearch']) ){
                if (isset($_GET['timTheo']) && !empty($_GET['timTheo']) ){
                    $wordSearch = $_GET['wordSearch'];
                    $timTheo = $_GET['timTheo'];
                    

                    if ($timTheo == "Mã hóa đơn"){
                        $query = "SELECT * FROM cart WHERE id LIKE '%$wordSearch%' ORDER BY id DESC LIMIT $tungTrang, $sanPhamTungTrang ";
                    }
                    if ($timTheo == "Mã khách hàng"){
                        $query = "SELECT * FROM cart WHERE id_khachhang LIKE '%$wordSearch%' ORDER BY id DESC LIMIT $tungTrang, $sanPhamTungTrang";
                    }
                    
                    
                    
                }
                
            }else{
                    $query = "SELECT * FROM cart,user WHERE (cart.id_khachhang = user.id) ORDER BY cart.id DESC LIMIT  $tungTrang, $sanPhamTungTrang "; //DESC: sản phẩm mới nhất sẽ lên đầu danh sách
            }


            
            //$query = "SELECT * FROM tbl_donhang ";
            $result = $this->db->select($query);
            return $result;

        }

        public function getAllHoaDon() //Dùng cho phân trang,...
        {

            if (isset($_GET['wordSearch']) && !empty($_GET['wordSearch']) ){
                if (isset($_GET['timTheo']) && !empty($_GET['timTheo']) ){
                    $wordSearch = $_GET['wordSearch'];
                    $timTheo = $_GET['timTheo'];

                    if ($timTheo == "Mã hóa đơn"){
                        $query = "SELECT * FROM cart WHERE id LIKE '%$wordSearch%' ORDER BY id DESC  ";
                    }
                    if ($timTheo == "Mã khách hàng"){
                        $query = "SELECT * FROM cart,user WHERE cart.id_khachhang=user.id AND user.name LIKE '%$wordSearch%' ORDER BY id DESC ";
                    }
                    
                    
                }
                
            }else{
                    $query = "SELECT cart.Id, user.name FROM cart,user WHERE (cart.id_khachhang = user.id) ORDER BY id DESC "; //DESC: sản phẩm mới nhất sẽ lên đầu danh sách
            }

            $result = $this->db->select($query);
            return $result;
        }

        
        public function sum_hoadon()
        {
            $query = "SELECT SUM(price_sanpham) AS tongHD FROM cart_details";
            $result = $this->db->select($query);
            return $result;
        }
        
        public function sum($id){
            $query = "SELECT SUM(price_sanpham) AS total FROM cart_details WHERE id_cart = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        
        
    }

?>