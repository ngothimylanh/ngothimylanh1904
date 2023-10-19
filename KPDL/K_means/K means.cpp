#include <bits/stdc++.h>

using namespace std;
struct Point{
    double x, y;
    double distance1;
    double distance2;
    double distance3;
    char val;
};

int KMeans(Point arr[], int n, Point c1, Point c2, Point c3)
{
	double xc1=0, xc2=0, xc3=0, yc1=0, yc2=0, yc3=0, dem1=0, dem2=0, dem3=0;
    for(int i =0 ;i <n ;i++)
    {
        arr[i].distance1 = sqrt(((arr[i].x - c1.x)*(arr[i].x - c1.x)) + ((arr[i].y - c1.y)*(arr[i].y - c1.y)));
        arr[i].distance2 = sqrt(((arr[i].x - c2.x)*(arr[i].x - c2.x)) + ((arr[i].y - c2.y)*(arr[i].y - c2.y)));
        arr[i].distance3 = sqrt(((arr[i].x - c3.x)*(arr[i].x - c3.x)) + ((arr[i].y - c3.y)*(arr[i].y - c3.y)));
    }

    for(int i=0;i<n;i++)
    {
            if(arr[i].distance1  < arr[i].distance2)
            {
            	if(arr[i].distance1  < arr[i].distance3)
            	{
            		xc1+= arr[i].x;
            		yc1+= arr[i].y;
            		arr[i].val='1';
            		dem1++;
				}else
				{
					xc3+= arr[i].x;
            		yc3+= arr[i].y;
            		arr[i].val='3';
            		dem3++;	
				}
                
            }else
            {
            	if(arr[i].distance2  < arr[i].distance3)
				{
					xc2+= arr[i].x;
            		yc2+= arr[i].y;
            		arr[i].val='2';
            		dem2++;	
				}else
				{
					xc3+= arr[i].x;
            		yc3+= arr[i].y;
            		arr[i].val='3';
            		dem3++;	
				}
			}
    }
    int yn=0;
	if(c1.x!=xc1/dem1||c1.y!=yc1/dem1)
    {
    	c1.x=xc1/dem1;
    	c1.y=yc1/dem1;
    	yn++;
	}
	if(c2.x!=xc2/dem2||c2.y!=yc2/dem2)
    {
    	c2.x=xc2/dem2;
    	c2.y=yc2/dem2;
    	yn++;
	}
	if(c3.x!=xc3/dem3||c3.y!=yc3/dem3)
    {
    	c3.x=xc3/dem3;
    	c3.y=yc3/dem3;
    	yn++;
	}
	
	if(yn>0)
	{
		cout<<endl<<"Diem trung tam cum 1: "<<c1.x<<" "<<c1.y<<endl;
		cout<<"Diem trung tam cum 2: "<<c2.x<<" "<<c2.y<<endl;
		cout<<"Diem trung tam cum 3: "<<c3.x<<" "<<c3.y<<endl<<endl;
		KMeans(arr, n, c1,c2,c3);
	}else{
		cout<<endl<<"Cum 1:"<<endl;
		for(int i=0;i<n;i++)
    	{	
    		if(arr[i].val == '1') cout<<"      "<<"A"<<i+1<<": "<<arr[i].x<<" "<<arr[i].y<<endl;
		}
		cout<<"Diem trung tam cua cum "<<" x: "<<c1.x<<" y: "<<c1.y<<endl<<endl;
		cout<<endl<<"Cum 2:"<<endl;
		for(int i=0;i<n;i++)
    	{	
    		if(arr[i].val == '2') cout<<"      "<<"A"<<i+1<<": "<<arr[i].x<<" "<<arr[i].y<<endl;
		}
		cout<<"Diem trung tam cua cum "<<" x: "<<c2.x<<" y: "<<c2.y<<endl<<endl;
		cout<<endl<<"Cum 3:"<<endl;
		for(int i=0;i<n;i++)
    	{	
    		if(arr[i].val == '3') cout<<"      "<<"A"<<i+1<<": "<<arr[i].x<<" "<<arr[i].y<<endl;
		}
		cout<<"Diem trung tam cua cum "<<" x: "<<c2.x<<" y: "<<c2.y<<endl<<endl;
	}
	
}

int main()
{
	int n;
	cout<<"Nhap so luong training data: ";
	cin >> n;
	freopen("Data.inp","r",stdin);
    Point arr[n];
	for(int i=0;i<n;i++){
		cin >> arr[i].x;
		cin >> arr[i].y;
	}
	freopen("PointData.inp","r",stdin);
	Point c1;
	Point c2;
	Point c3;
   	cin >> c1.x;
   	cin >> c1.y;
   	cin >> c2.x;
   	cin >> c2.y;
   	cin >> c3.x;
   	cin >> c3.y;
   	
	KMeans(arr, n, c1,c2,c3);
    return 0;
}
