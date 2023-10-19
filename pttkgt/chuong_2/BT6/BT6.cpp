#include<bits/stdc++.h>
using namespace std;
int a[100],n,d=0;
void Xuat(int n,int a[])
{
	d++;
    cout<<d<<": "; 
	for(int i=0;i<n;i++) cout<<a[i];
	cout<<endl;
}
void Doi0(int m,int n,int a[])
{
	for(int i=m;i<n;i++)
	{
		a[i]=0;
	}
}
void ChuoiNP(int n,int a[])
{
	Xuat(n,a);
	int i=n-1;
	while(i>0)
	{
		if(a[i]==1) i--;
		if(a[i]==0) 
		{
			a[i]=1;
			Doi0(i+1,n,a);
			Xuat(n,a);
			i=n-1;
		}
	}
}
int main()
{
	freopen("BT6.inp","r",stdin);
    freopen("BT6.out","w",stdout);
	cin>>n;
	ChuoiNP(n,a);	
}
