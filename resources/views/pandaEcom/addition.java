package Inheritance;
/**
 * addition
 */
class addition {
    int roll;
    String name = new String();
    
}
/**
 * Inneraddition
 */
class result extends addition{
    float mark;
    void GetData(){
        roll=986;
        name="rakib";
        mark=70.75f;
    }
    void display(){
        System.out.println("roll:"+roll);
    }
}
public class Inherit {
    public static void main(String[] args) {
        result r = new result();
        r.GetData();
        r.display();

    }
    
}