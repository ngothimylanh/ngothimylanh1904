class Cau7 
{
	public void timsongay(int thang,int nam){
		int songay=31;
		switch(thang){
			case 4:
			case 6:
			case 9:
			case 11: songay=30;break;
			case 2: {songay=28;
			         if ((nam%400==0)||(nam%4==0 && nam%100!=0)) songay=29;break;}
		}
		System.out.println("Thang "+thang+" nam "+nam+" co so ngay la: "+songay);
	}
	public static void main(String[] args) 
	{
		Cau7 sn=new Cau7();
		sn.timsongay(2,1900);
	}
}