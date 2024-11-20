// package HangMan;
import java.util.Scanner;
import java.util.Arrays;

public class HangMan {
    private String word;
    void title(){
        System.out.println("H A N G M A N");
    }

    String getterMethod(){
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter the word: ");
        this.word = sc.nextLine();
        sc.close();
        return word;
    }

    void setterMethod(HangMan hm){
        System.out.println("Guess the word: " + hm.getterMethod());
    }

    void hangMan(HangMan hm){
        int size = this.word.length();
        char[] userGuess = new char[size];
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter the word in char of size : "+ size);
        for(int i = 0; i<size; i++){
            // System.out.println("for loop chayo??? "+ size);
    
            userGuess[i] = sc.next().charAt(0);
            // System.out.println("for loop chayo line 31??? "+ size);
        }
        sc.close();
        System.out.println("The word is in char is :"+ Arrays.toString(userGuess));
    }
}

class Main{
    public static void main(String[] args) {
        HangMan hm = new HangMan();
        hm.title();
        hm.setterMethod(hm);
        hm.hangMan(hm);
    }
}