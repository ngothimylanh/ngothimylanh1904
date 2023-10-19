import java.io.*;
public class Cau1
{
	public void TimMax3so(int a,int b,int c)
	{
		int max;
		//dung if khong co else
		//max=a;
		/*if(max<b) max=b;
		if(max<c) max=c;*/
		//dung if...else
		if(a>b && a>c)max=a;
		else
			if(b>c) max=b;
		    else max=c;
		//dung toan tu ?:
		//max=(a>b && a>c)?a:(b>c?b:c);
		System.out.println("Max = "+max);
	}
	public static void main(String[] args) 
	{
		Cau1 m=new Cau1();
		m.TimMax3so(12,21,32);
	}
}