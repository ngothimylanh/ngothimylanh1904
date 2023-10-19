#include<bits/stdc++.h>
#include<string>
using namespace std;

long long A[200];

void init() 
{
	for (int i = 0; i < 200; i++) 
	{
		A[i] = -1;
	}
}

unsigned long long fiboQHD(int n) {
	if (A[n] == -1){
		if (n <= 1) {
			A[n] = n;
		}
		else {
			A[n] = fiboQHD(n - 1) + fiboQHD(n - 2);
		}
	}
	return A[n];
}

int main() 
{
	init();
	int n;
	freopen("FiboQHD.inp","r",stdin);
	freopen("FiboQHD.out","w",stdout);
	cin>>n;
	cout<< fiboQHD(n) << endl;
	return 0;
}
