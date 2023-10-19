#include <bits/stdc++.h>       

using namespace std;
struct Point{                          
    char val; 
    double x, y;
    double d;
};

int phanLopKnn(Point arr[],int k, int n, Point p)
{
    for(int i =0 ;i <n ;i++)
    {
        arr[i].d = sqrt(((arr[i].x - p.x)*(arr[i].x - p.x)) + ((arr[i].y - p.y)*(arr[i].y - p.y)));
    }

    for(int i=0;i<n-1;i++)
    {
        for(int j = i+1; j<n;j++)
        {
            if(arr[i].d  > arr[j].d)
            {
                swap(arr[i], arr[j]);
            }
        }
    }

    int dem1 = 0;
    int dem2 = 0;

    for(int i=0;i<k;i++)
    {
        if(arr[i].val == 'A')
        {
            dem1++;
        }
        else if(arr[i].val == 'B')
        {
            dem2++;
        }
    }
    cout<<"Nhan cua test data la: ";
    if(dem1 > dem2)
    {
        cout<<"A"<<endl;
    }
    else{
        cout<<"B"<<endl;
    }
}

int main()
{
	int n,k;
	cout<<"Nhap training data: ";
	cin>>n;
	cout<<"Nhap k: ";
	cin>>k;
	freopen("TrainData.inp","r",stdin);
    Point arr[n];
	for(int i=0;i<n;i++){
		cin >> arr[i].x;
		cin >> arr[i].y;
		cin >> arr[i].val;
	}
	freopen("TestData.inp","r",stdin);
	Point p;
   	cin >> p.x;
   	cin >> p.y;
    phanLopKnn(arr,k, n, p);
    return 0;
}
